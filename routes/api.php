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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('flicker', ['App\Http\Controllers\FlickerController', 'index']);
Route::get('flicker/refresh', ['App\Http\Controllers\FlickerController', 'refresh']);
Route::post('flicker', ['App\Http\Controllers\FlickerController', 'save']);
Route::delete('flicker', ['App\Http\Controllers\FlickerController', 'delete']);