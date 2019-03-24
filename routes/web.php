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
    return view('home');
    // return redirect('/home');
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


// training session
Route::get('/sessions/create', 'TrainingSession\CreateController@create')->name('sessions.create');
Route::post('/sessions','TrainingSession\StoreController@store')->name('sessions.store');

// Coaches
Route::resource('coaches','Coach\CoachController');
