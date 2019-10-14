<?php

use Illuminate\Http\Request;


Route::get('movies', 'MovieController@all');
Route::get('movies/{movie}', 'MovieController@show');
Route::group(['middleware' => 'auth:api'], function() {

    Route::post('movies', 'MovieController@store');
    Route::put('movies/{movie}', 'MovieController@update');
    Route::delete('movies/{movie}', 'MovieController@delete');

});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');


Route::middleware('auth:api')
        ->get('/user', function (Request $request) {
            return $request->user();
        });

