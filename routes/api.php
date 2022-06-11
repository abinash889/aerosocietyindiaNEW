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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/all',[App\Http\Controllers\CountryController::class, 'all']);
Route::delete('/citydlt/{id}',[App\Http\Controllers\CityController::class, 'citydlt']);
Route::post('/citycreate',[App\Http\Controllers\CityController::class, 'citycreate']);
Route::put('/cityudt/{id}',[App\Http\Controllers\CityController::class, 'cityudt']);
