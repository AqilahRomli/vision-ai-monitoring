<?php

namespace App\Contracts;

interface AnalyticsProvider
{
    // Normalized shape both dummy + real providers must produce
    public function poll(): array; // array of ['camera_external_id', 'gender', 'age_bucket', 'emotion', 'detected_at']
}