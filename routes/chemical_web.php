<?php

use App\Http\Controllers\ChemicalController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('chemicals', ChemicalController::class);
});
