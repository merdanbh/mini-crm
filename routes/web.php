<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
]);

Route::group(['middleware' => ['auth']], function () {
    Route::view('/', 'dashboard');

    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});
