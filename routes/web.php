<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify'=>true]);
Route::get('/', function () {
    if (Auth::check())
    {
        return view('home');
    }
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//****************login facebook**************

Route::get('/redirect/{service}', 'App\Http\Controllers\SocialController@redirect');
Route::get('/callback/{service}', 'App\Http\Controllers\SocialController@callback');

//**************Profile image************************

Route::get('/profile', 'App\Http\Controllers\HomeController@profile');
Route::post('/profile', 'App\Http\Controllers\HomeController@update_avatar');
