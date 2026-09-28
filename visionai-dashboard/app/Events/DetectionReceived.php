<?php

namespace App\Events;

use App\Models\Detection;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class DetectionReceived implements ShouldBroadcastNow
{
    public function __construct(public Detection $detection) {}

    public function broadcastOn(): Channel
    {
        return new Channel('visionai-dashboard');
    }

    public function broadcastWith(): array
    {
        return [
            'camera_id' => $this->detection->camera_id,
            'gender' => $this->detection->gender,
            'age_bucket' => $this->detection->age_bucket,
            'emotion' => $this->detection->emotion,
            'detected_at' => $this->detection->detected_at,
        ];
    }
}