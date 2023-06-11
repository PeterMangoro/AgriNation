<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Garden\PlantController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('plants', PlantController::class);
});
