<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
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
})->name('home')->middleware('auth');

Route::get('/login', [AuthController::class,'showLoginForm'])
    ->name('auth.show.login')
    ->middleware('guest');

Route::post('/login', [AuthController::class,'login'])
    ->name('auth.submit.login')
    ->middleware('guest');

Route::get('/redirect/{driver}',[AuthController::class,'redirectToProvider'])
    ->name('login.google')
    ->where('driver', implode('|',config('auth.socialite.drivers')));

Route::get('/login/google/callback',[AuthController::class,'handleProviderCallback']);

Route::get('/logout',[AuthController::class,'logout'])
    ->name('auth.logout')
    ->middleware('auth');
