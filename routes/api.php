<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Route::post('/login',\App\Http\Controllers\Api\AuthController::class);
//Route::resource('api','AuthController');

Route::group(['middleware' => ['jwt.verify']], function() {

    //Route::get('user','App\Http\Controllers\UserController@getAuthenticatedUser');
    //Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'user']);
    Route::get('/user',[\App\Http\Controllers\Api\UserController::class, 'show']);
    Route::post('/logout',[\App\Http\Controllers\Api\AuthController::class, 'logout']);

});

Route::get('/sedes/{id}/selsede',[\App\Http\Controllers\Sede\SedeController::class, 'selsede']); //Ruta para ejecutar select dependiente al seleccionar cliente y sede

Route::get('/domicilios',[\App\Http\Controllers\Api\DomiciliosController::class, 'index']);
Route::get('/misdomicilios',[\App\Http\Controllers\Api\DomiciliosController::class, 'misDomicilios']);
Route::post('/login',[\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register',[\App\Http\Controllers\Api\AuthController::class, 'register']);
