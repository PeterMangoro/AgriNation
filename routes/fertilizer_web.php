<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FertilizerController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('fertilizers', FertilizerController::class);
});
