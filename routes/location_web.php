<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Garden\LocationController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('locations', LocationController::class);
});
