<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\RegistrationController;
use \App\Http\Controllers\PostController;
use App\Models\Users;
use App\Models\Posts;
use App\Http\Middleware\UserIsAuthorized;
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

Route::middleware([UserIsAuthorized::class]) ->group(function(){
    Route::get("/", function (Posts $posts) {
        return view('feed', ['posts' => $posts->all()]);
    });

    Route::view('company', 'company');
    Route::view('contacts', 'contacts');

    Route::get('users/{user}', function(Users $user){
        return view('layout_profile', ['id' => $user['id'], 'username' => $user['username']]);
    });

    Route::post('new_post', [PostController::class, 'create_post']);
});

Route::get('/auth', [AuthController::class, 'show']);
Route::post('/auth', [AuthController::class, 'validate_login']);

Route::get('/registration', [RegistrationController::class, 'show']);
Route::post('/registration', [RegistrationController::class, 'validate_registration']);

Route::get('/exit', [AuthController::class, 'exit']);