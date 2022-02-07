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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'Auth\LoginController@login');

Route::post('/logout', 'Auth\LoginController@logout');

Route::post('/register', 'Auth\RegisterController@register');

Route::get('/tvseries', 'ApiController@getAllTvSeries');

Route::get('/tvseries/delete/{id}', 'ApiController@deleteTvSeries');

Route::get('/tvseries/{id}', 'ApiController@getSingleTvSeries');

Route::post('/tvseries/store', 'ApiController@storeNewTvSeries');

Route::post('/tvseries/update/{id}', 'ApiController@updateTvSeries');
