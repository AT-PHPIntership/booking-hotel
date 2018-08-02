<?php

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
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware' => 'AdminMiddleware'], function() {
    Route::get('/home', function(){
        return view('admin.layout.index');
	  });
    Route::resource('hotels', 'HotelController');

    Route::resource('users', 'UserController');
    
    Route::resource('room-types', 'RoomTypeController');

    Route::resource('cities', 'CityController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
