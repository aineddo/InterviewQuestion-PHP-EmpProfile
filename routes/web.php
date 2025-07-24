<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Display form
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
// Handle form submission
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Display all employees
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

//Route::resource('employees', EmployeeController::class);