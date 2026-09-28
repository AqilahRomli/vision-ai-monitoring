<?php

namespace App\Actions;

use App\Events\DetectionReceived;
use App\Models\Camera;
use App\Models\Detection;
use App\Models\MinuteStat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

// The ONE place that saves a detection, updates the per-minute counter and
// broadcasts it to the dashboard. Both the dummy generator and the real
// SenseStudio webhook call this, so they can never behave differently.
class IngestDetection
{
    public function handle(
        Camera $camera,
        ?string $gender,
        ?string $ageBucket,
        ?string $emotion,
        Carbon|string $detectedAt
    ): Detection {
        $detection = Detection::create([
            'camera_id' => $camera->id,
            'gender' => $gender,
            'age_bucket' => $ageBucket,
            'emotion' => $emotion,
            'detected_at' => $detectedAt,
        ]);

        $minute = Carbon::parse($detectedAt)->startOfMinute();
        MinuteStat::updateOrCreate(
            ['camera_id' => $camera->id, 'minute' => $minute],
            ['count' => DB::raw('count + 1')]
        );

        broadcast(new DetectionReceived($detection));

        return $detection;
    }
}