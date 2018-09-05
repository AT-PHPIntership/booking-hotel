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
Route::group(['as' => 'api.', 'namespace' => 'User'], function() {

	Route::middleware('auth:api')->get('/user', function (Request $request) {
			return response()->json($request->user());
	})->name('user');

	Route::group(['namespace' => 'Auth'], function() {

		Route::post('login', 'LoginController@login');

		Route::group(['middleware' => 'auth:api'], function() {
			Route::post('change-user', 'LoginController@changeUserInfor');
			Route::post('edit-user', 'LoginController@editUserInfor');
			Route::post('logout', 'LoginController@logout');

			Route::post('comments/create', 'CommentController@create');

			Route::post('booking-hotel', 'BookedRoomController@create');
			Route::post('list-booking', 'BookedRoomController@listBooking');
			Route::post('delete-booking', 'BookedRoomController@deleteBooking');
		});

		Route::post('register', 'RegisterController@register');

		Route::post('comments', 'CommentController@index');

	});

	Route::get('hotels', 'HotelController@index');
	Route::post('hotels-search', 'HotelController@showHotelsFollowConditions');
	Route::post('hotels-filter', 'HotelController@showHotelsFilter');

	Route::apiResource('slides', 'SlideController');

	Route::apiResource('cities', 'CityController');

	Route::post('rooms', 'RoomController@index');

});
