<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::post('/employees/store', [\App\Http\Controllers\EmployeeController::class, 'store']);
});

