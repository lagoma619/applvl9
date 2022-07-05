<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if(\Illuminate\Support\Facades\Auth::check()){
        return view('home');
    }

    return view('auth.login');

});

Route::view('/layout/login', 'login');


Auth::routes();

Route::group(['middleware'=>['auth']], function (){

    Route::get('/logout', 'App\Http\Controllers\Auth\LogoutController@perform')->name('logout.perform');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/create', function () {
    return view('users.create');
});
