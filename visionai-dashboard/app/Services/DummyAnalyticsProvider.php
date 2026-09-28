<?php

namespace App\Services;

use App\Contracts\AnalyticsProvider;
use App\Models\Camera;

class DummyAnalyticsProvider implements AnalyticsProvider
{
    public function poll(): array
    {
        $cameras = Camera::pluck('external_id');
        $events = [];

        foreach ($cameras as $externalId) {
            for ($i = 0; $i < random_int(0, 5); $i++) {
                $events[] = [
                    'camera_external_id' => $externalId,
                    'gender' => fake()->randomElement(['male', 'female']),
                    'age_bucket' => fake()->randomElement(['adult', 'adult', 'adult', 'old', 'child']),
                    'emotion' => null,
                    'detected_at' => now(),
                ];
            }
        }

        return $events;
    }
}