<?php

use App\Http\Controllers\Finance\CreditController;
use App\Http\Controllers\Finance\DebitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Finance\IncomeController;
use App\Http\Controllers\Finance\ExpenditureController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
            Route::resource('expenditures', ExpenditureController::class);
            Route::resource('incomes', IncomeController::class);
            Route::resource('credits', CreditController::class);
            Route::resource('debits', DebitController::class);
});
