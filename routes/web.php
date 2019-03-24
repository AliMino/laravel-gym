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
    // return view('welcome');
    return view('users.index');
    // return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// gyms
Route::get('/gyms/create', 'Gym\CreateController@create')->name('gyms.create');
Route::post('/gyms','Gym\StoreController@store')->name('gyms.store');

// training packages
Route::get('/packages/create', 'TrainingPackage\CreateController@create')->name('packages.create');
Route::post('/packages','TrainingPackage\StoreController@store')->name('packages.store');

// training sessions
Route::get('/sessions/create', 'TrainingSession\CreateController@create')->name('sessions.create');
Route::post('/sessions','TrainingSession\StoreController@store')->name('sessions.store');

// users
Route::get('/users', 'UsersController@index')->name('users.index');

// Coaches
Route::resource('coaches','Coach\CoachController');
Route::get('coachdata', 'Coach\CoachController@getdata')->name('coach.data');

//City Manager
Route::get('/citymanagers','CityManagerController@index')->name('citymanagers.index');
Route::get('/citymanagers/create','CityManagerController@create')->name('citymanagers.create');
Route::post('/citymanagers','CityManagerController@store')->name('citymanagers.store');
Route::get('/citymanagers/{manager}','CityManagerController@show')->name('citymanagers.show');
Route::get('/citymanagers/{manager}/edit','CityManagerController@edit')->name('citymanagers.edit');
Route::put('/citymanagers/{manager}','CityManagerController@update')->name('citymanagers.update');
Route::delete('/citymanagers/{manager}','CityManagerController@destroy')->name('citymanagers.destroy');
Route::get('/citymanagersdata', 'CityManagerController@getdata')->name('citymanagers.data');



