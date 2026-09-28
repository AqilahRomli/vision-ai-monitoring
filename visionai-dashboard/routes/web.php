<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SenseStudioWebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
Route::post('/webhooks/sensestudio', SenseStudioWebhookController::class);