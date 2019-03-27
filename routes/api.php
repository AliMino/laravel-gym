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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes(['verify' => true]);

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');




Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', 'Api\AuthController@logout');
<<<<<<< HEAD
    Route::put('member/{member}', 'Api\MemberController@update');
    Route::get('mysessions/', 'Api\TrainingsessionController@ShowRemainingSessions');
    Route::get('history/', 'Api\AttendanceController@ShowHistory');
    Route::post('sessions/{session}/attend', 'Api\TrainingsessionController@AttendSession');

=======
    Route::put('member', 'Api\MemberController@update');
    Route::get('sessions/', 'Api\TrainingsessionController@ShowRemainingSessions');
>>>>>>> b6a50b9b2e3e377d54b94c4f72ec5edd3e593a5e

});

