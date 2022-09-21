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

Route::get('/', function () {
    return view('auth.login');
});




Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/app', function () {
        /* return view('layouts.app');*/
    });


    Route::resource('users','App\Http\Controllers\User\UserController');
    Route::resource('clients','App\Http\Controllers\Client\ClienteController');
/*
    Route::get('/users',[\App\Http\Controllers\User\UserController::class, 'index'])->name('users.index');
    Route::get('/users/new',[\App\Http\Controllers\User\UserController::class, 'index'])->name('users.new');
*/

  /*  Route::get('/users/new', function () {
        return view('users.new');
    })->name('usernew'); */

    Route::get('/clients/new', function () {
        return view('clients.create');
    })->name('clientenew');

    Route::get('/clients/sedenew', function () {
        return view('clients.sedenew');
    })->name('sedenew');

//Usuarios
    //Route::resource('usuarios', 'App\Http\Controllers\User\UserController');




});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

*/
