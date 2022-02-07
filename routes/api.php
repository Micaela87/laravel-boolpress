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

Route::get('/posts', 'ApiController@getAllPosts');

Route::get('/posts/delete/{id}', 'ApiController@deletePost');

Route::get('/posts/{id}', 'ApiController@getSinglePost');

Route::post('/posts/store', 'ApiController@storeNewPost');

Route::post('/posts/update/{id}', 'ApiController@updatePost');