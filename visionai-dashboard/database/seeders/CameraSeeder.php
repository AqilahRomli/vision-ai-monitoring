<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    \App\Models\Camera::create(['event_code' => 'hsn', 'name' => 'Marquee Tent Entrance', 'external_id' => 'cam-1']);
    \App\Models\Camera::create(['event_code' => 'hsn', 'name' => 'Flag-Off Arch (Front)', 'external_id' => 'cam-2']);
    \App\Models\Camera::create(['event_code' => 'hsn', 'name' => 'Flag-Off Arch (Back/Finish)', 'external_id' => 'cam-3']);
    }
}
