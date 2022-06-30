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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\LoginController;


Route::get('/', 'LoginController@isLoggedIn');
Route::post('/auth/login', 'LoginController@login');
Route::get('logout', [LoginController::class, 'logout']);

Route::prefix('auth')->group(function() {
    Route::put('reset-password', [LoginController::class, 'resetPassword']);
});


Route::prefix('profile')->group(function() {
    Route::get('detail-user', [LoginController::class, 'getUser']);
    Route::get('', [LoginController::class, 'profile']);
    Route::get('view-changepassword', [LoginController::class, 'getViewPassword']);
    Route::post('update', [LoginController::class, 'updateUser']);
});