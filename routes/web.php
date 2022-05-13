<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserUpdatePasswordController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user',UserController::class);
Route::resource('country',CountryController::class);
Route::resource('/state',StateController::class);
Route::resource('/city',CityController::class);

Route::post('/user/{user}/change-password',[UserUpdatePasswordController::class, 'ChangePassword'])->name('user.upadate.password');