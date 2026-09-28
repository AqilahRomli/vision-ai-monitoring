<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Detection;
use App\Models\MinuteStat;

class DashboardController extends Controller
{
    // A camera is "congested" when it has more than this many detections in the last 60 seconds
    private const CONGESTION_THRESHOLD = 50;

    // Page load: Laravel embeds the first set of numbers in the page
    public function index()
    {
        return view('dashboard', ['stats' => $this->buildStats()]);
    }

    // Auto-refresh: the page calls this every 30 seconds
    public function stats()
    {
        return response()->json($this->buildStats());
    }

    private function buildStats(): array
    {
        $today = Detection::whereDate('detected_at', today());

        // detections per camera in the last 60 seconds -> congestion check
        $lastMinute = Detection::where('detected_at', '>=', now()->subMinute())
            ->selectRaw('camera_id, count(*) as total')
            ->groupBy('camera_id')
            ->pluck('total', 'camera_id');
        $busiest = (int) ($lastMinute->max() ?? 0);

        // 24 hourly slots per camera (index 0 = 12AM ... 23 = 11PM)
        $hourly = [];
        foreach (Camera::pluck('id') as $id) {
            $hourly[$id] = array_fill(0, 24, 0);
        }
        $rows = (clone $today)
            ->selectRaw('camera_id, HOUR(detected_at) as hr, count(*) as total')
            ->groupBy('camera_id', 'hr')
            ->get();
        foreach ($rows as $row) {
            $hourly[$row->camera_id][(int) $row->hr] = (int) $row->total;
        }

        return [
            'totalVisitors' => (clone $today)->count(),
            'peakCount' => (int) (MinuteStat::max('count') ?? 0),
            'congestion' => [
                'status' => $busiest > self::CONGESTION_THRESHOLD ? 'ALERT' : 'NORMAL',
                'current' => $busiest,
                'threshold' => self::CONGESTION_THRESHOLD,
            ],
            'gender' => (clone $today)->selectRaw('gender, count(*) as total')
                ->groupBy('gender')->pluck('total', 'gender'),
            'age' => (clone $today)->selectRaw('age_bucket, count(*) as total')
                ->groupBy('age_bucket')->pluck('total', 'age_bucket'),
            'hourly' => $hourly,
        ];
    }
}