<?php

namespace App\Http\Controllers;

use App\Actions\IngestDetection;
use App\Models\Camera;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Receives the events SenseStudio pushes to us (row 7/8 of the API flow sheet).
// Everything that depends on the REAL payload format is in this one file.
class SenseStudioWebhookController extends Controller
{
    public function __invoke(Request $request, IngestDetection $ingest)
    {
        // 1) Shared-secret check, so strangers cannot inject fake detections
        $expected = config('services.sensestudio.webhook_token');
        $given = $request->header('X-Webhook-Token') ?? $request->query('token');

        if (!$expected || !is_string($given) || !hash_equals($expected, $given)) {
            return response()->json(['error' => 'unauthorized'], 401);
        }

        // 2) Keep the raw payload in storage/logs/laravel.log. The first REAL
        //    event tells us the true format, so we never have to guess.
        $payload = $request->all();
        Log::info('SenseStudio webhook received', ['payload' => $payload]);

        // 3) Which of our cameras is this? (external_id must hold SenseStudio's id)
        $ids = array_filter([
            data_get($payload, 'device_info.device_id'),
            data_get($payload, 'device_info.camera_id'),
        ]);
        $camera = Camera::whereIn('external_id', $ids)->first();

        if (!$camera) {
            Log::warning('SenseStudio webhook: unknown camera', ['ids' => array_values($ids)]);
            return response()->json(['status' => 'ignored', 'reason' => 'unknown camera'], 202);
        }

        // 4) Map the payload -> our normalized detection
        [$gender, $ageBucket, $emotion] = $this->extractAttributes($payload['attributes'] ?? []);
        $detectedAt = $this->parseTime($payload['trigger_time'] ?? null);

        // ASSUMPTION to confirm with real data: one pushed event = one detection.
        // If an event can carry several people (target_count), change it here.
        $detection = $ingest->handle($camera, $gender, $ageBucket, $emotion, $detectedAt);

        return response()->json(['status' => 'ok', 'detection_id' => $detection->id]);
    }

    // PLACEHOLDER FORMAT: the sample event in the team sheet has attributes = [],
    // so the real shape is unknown. This accepts [{"key":"gender","value":"male"}, ...].
    // When the first real event shows up in the log, adjust ONLY this method.
    private function extractAttributes(array $attributes): array
    {
        $found = ['gender' => null, 'age' => null, 'emotion' => null];

        foreach ($attributes as $attr) {
            $key = strtolower((string) data_get($attr, 'key'));
            if (array_key_exists($key, $found)) {
                $found[$key] = strtolower((string) data_get($attr, 'value')) ?: null;
            }
        }

        return [$found['gender'], $found['age'], $found['emotion']];
    }

    // Stored in the app timezone (Asia/Kuala_Lumpur) so it matches the dummy data
    private function parseTime(?string $time): Carbon
    {
        try {
            return $time
                ? Carbon::parse($time)->setTimezone(config('app.timezone'))
                : now();
        } catch (\Throwable $e) {
            return now();
        }
    }
}