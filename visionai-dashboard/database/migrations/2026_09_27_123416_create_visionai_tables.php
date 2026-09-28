<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
   {
    Schema::create('cameras', function (Blueprint $table) {
        $table->id();
        $table->string('event_code');
        $table->string('name');
        $table->string('external_id')->nullable();
        $table->timestamps();
    });

    Schema::create('detections', function (Blueprint $table) {
        $table->id();
        $table->foreignId('camera_id')->constrained();
        $table->string('gender')->nullable();
        $table->string('age_bucket')->nullable();
        $table->string('emotion')->nullable();
        $table->timestampTz('detected_at');
        $table->timestamps();
    });

    Schema::create('minute_stats', function (Blueprint $table) {
        $table->id();
        $table->foreignId('camera_id')->constrained();
        $table->timestampTz('minute');
        $table->unsignedInteger('count')->default(0);
        $table->unique(['camera_id', 'minute']);
    });
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visionai_tables');
    }
};
