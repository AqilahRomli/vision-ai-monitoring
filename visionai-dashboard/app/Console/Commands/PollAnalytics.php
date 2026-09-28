<?php

namespace App\Console\Commands;

use App\Actions\IngestDetection;
use App\Contracts\AnalyticsProvider;
use App\Models\Camera;
use Illuminate\Console\Command;

class PollAnalytics extends Command
{
    protected $signature = 'analytics:poll';
    protected $description = 'Pull detection events and broadcast them';

    public function handle(AnalyticsProvider $provider, IngestDetection $ingest)
    {
        foreach ($provider->poll() as $event) {
            $camera = Camera::where('external_id', $event['camera_external_id'])->first();
            if (!$camera) continue;

            $ingest->handle(
                $camera,
                $event['gender'],
                $event['age_bucket'],
                $event['emotion'],
                $event['detected_at']
            );
        }

        $this->info('Poll complete.');
    }
}