<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fertilization\FertilizationController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('fertilizations', FertilizationController::class);
});