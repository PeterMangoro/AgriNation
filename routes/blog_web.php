<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogController;
// use App\Http\Controllers\Blog\ChemicalController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::resource('chemicals', ChemicalController::class);
            Route::resource('blogs', BlogController::class);
});
