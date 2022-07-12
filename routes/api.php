<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;


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

Route::post('login', [App\Http\Controllers\API\UserController::class,'login']);

Route::group(['middleware' => ['jwt.auth']], function () {
 
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    

});

// Route::post('/all',[App\Http\Controllers\CountryController::class, 'all']);
// Route::delete('/citydlt/{id}',[App\Http\Controllers\CityController::class, 'citydlt']);
// Route::post('/citycreate',[App\Http\Controllers\CityController::class, 'citycreate']);
// Route::put('/cityudt/{id}',[App\Http\Controllers\CityController::class, 'cityudt']);
