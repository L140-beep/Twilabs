<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FormController; 
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\RegistrationController;
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

Route::get("/", function () {
    return view('welcome');
});

Route::view('company', 'company');
Route::view('contacts', 'contacts');
Route::get('/auth', [AuthController::class, 'show']);
Route::post('/auth', [AuthController::class, 'validate_login']);
Route::get('/registration', [RegistrationController::class, 'show']);
Route::post('/registration', [RegistrationController::class, 'validate_registration']);