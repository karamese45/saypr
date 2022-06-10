<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
    Route::view('/', 'auth.login')->name('login');
    Route::view('login', 'auth.login')->name('login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);
});

Route::group(['middleware' => ['auth', 'authorization']], function () {
    Route::view('home', 'home');
    Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout']);

    Route::group(['prefix' => 'company'], function () {
        Route::view('add', 'company.add-edit');
        Route::get('edit/{id}', [App\Http\Controllers\CompanyController::class, 'editView']);

        Route::get('', [App\Http\Controllers\CompanyController::class, 'all']);
        Route::post('', [App\Http\Controllers\CompanyController::class, 'add']);
        Route::patch('{id}', [App\Http\Controllers\CompanyController::class, 'edit']);
    });

    Route::group(['prefix' => 'employee'], function () {
        Route::get('add', [App\Http\Controllers\EmployeeController::class, 'addView']);
        Route::get('edit/{id}', [App\Http\Controllers\EmployeeController::class, 'editView']);

        Route::get('', [App\Http\Controllers\EmployeeController::class, 'all']);
        Route::post('', [App\Http\Controllers\EmployeeController::class, 'add']);
        Route::patch('{id}', [App\Http\Controllers\EmployeeController::class, 'edit']);

    });
});

