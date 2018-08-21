<?php

use Illuminate\Http\Request;

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
Route::group(['as' => 'api.'], function() {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return response()->json($request->user());
    })->name('user');

    Route::group(['namespace' => 'User\Auth'], function() {

        Route::post('login', 'LoginController@login')->name('login');
        // Route::post('register', 'AuthController@register')->name('register');

        // Route::group(['middleware' => 'auth:api'], function() {
        //     Route::post('logout', 'AuthController@logout')->name('logout');
        //     Route::put('password', 'AuthController@changePassword');
        // });
    });
});
