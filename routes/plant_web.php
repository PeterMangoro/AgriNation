<?php

use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('plants', PlantController::class);
});
