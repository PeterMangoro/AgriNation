<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Spray\SprayController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('sprays', SprayController::class);
});
