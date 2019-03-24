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
    // added by ali kamel for testing & demo purposes
    // demo of charts
    // return view('users.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// gym
Route::get('/gyms', 'Gym\StoreController@index')->name('gyms.index');
Route::get('/gyms/create', 'Gym\CreateController@create')->name('gyms.create');
Route::post('/gyms','Gym\StoreController@store')->name('gyms.store');
Route::get('/gyms/{gym}/edit','Gym\EditController@edit')->name('gyms.edit');
Route::put('/gyms/{gym}','Gym\EditController@update')->name('gyms.update');
Route::delete('/gyms/{gym}','Gym\DeleteController@destroy')->name('gyms.destroy');
/* Route::resource('gyms','Gym\StoreController');
Route::get('gymdata', 'Gym\StoreController@getdata')->name('gym.data'); */

// training package
Route::get('/packages','TrainingPackage\StoreController@index')->name('packages.index');
Route::get('/packages/create', 'TrainingPackage\CreateController@create')->name('packages.create');
Route::post('/packages','TrainingPackage\StoreController@store')->name('packages.store');
Route::get('/packages/{package}/edit','TrainingPackage\EditController@edit')->name('packages.edit');
Route::put('/packages/{package}','TrainingPackage\EditController@update')->name('packages.update');
Route::delete('/packages/{package}','TrainingPackage\DeleteController@destroy')->name('packages.destroy');


// training sessions
Route::get('/sessions/create', 'TrainingSession\CreateController@create')->name('sessions.create');
Route::post('/sessions','TrainingSession\StoreController@store')->name('sessions.store');

// users
Route::get('/users', 'UsersController@index')->name('users.index');

// Coaches
Route::resource('coaches','Coach\CoachController');
Route::get('coachdata', 'Coach\CoachController@getdata')->name('coach.data');

// cities
Route::get('/cities/create', 'CitiesController@create')->name('cities.create');
Route::post('/cities','CitiesController@store')->name('cities.store');





















// buying packages
Route::get('/payments/create', 'Payment\PaymentController@create')->name('payment.create');
Route::post('/payments', 'Payment\PaymentController@store')->name('payment.store');



//City Manager
Route::get('/citymanagers','CityManagerController@index')->name('citymanagers.index');
Route::get('/citymanagers/create','CityManagerController@create')->name('citymanagers.create');
Route::post('/citymanagers','CityManagerController@store')->name('citymanagers.store');
Route::get('/citymanagers/{manager}','CityManagerController@show')->name('citymanagers.show');
Route::get('/citymanagers/{manager}/edit','CityManagerController@edit')->name('citymanagers.edit');
Route::put('/citymanagers/{manager}','CityManagerController@update')->name('citymanagers.update');
Route::delete('/citymanagers/{manager}','CityManagerController@destroy')->name('citymanagers.destroy');
Route::get('/citymanagersdata', 'CityManagerController@getdata')->name('citymanagers.data');



