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

Route::group(['namespace' => 'User', 'as' => 'user.'], function() {
    Route::get('/', function () {
        return view('user.home.home');
    })->name('home');

    Route::get('/user/login', 'AuthController@showLoginForm')->name('login');
    Route::get('/user/register', 'AuthController@showRegisterForm')->name('register');
});

Route::group(['prefix' => 'admin', 'middleware' => 'AdminMiddleware'], function() {
    Route::get('/home', function(){
        return view('admin.layout.index');
	})->name('admin.home');

    Route::resource('hotels', 'HotelController');

    Route::resource('users', 'UserController');
    
    Route::resource('room-types', 'RoomTypeController');

    Route::resource('cities', 'CityController');

    Route::resource('services', 'ServiceController')->except(['show']);

    Route::resource('service-types', 'ServiceTypeController')->except(['show']);

    Route::resource('booked-rooms', 'BookedRoomController')->only(['index', 'edit', 'update', 'destroy']);

    Route::resource('slides', 'SlideController')->only(['index', 'create', 'store' , 'destroy']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
