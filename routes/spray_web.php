<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Spray\SprayController;
use App\Http\Controllers\Spray\ChemicalController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('chemicals', ChemicalController::class);
            Route::resource('sprays', SprayController::class);
});
