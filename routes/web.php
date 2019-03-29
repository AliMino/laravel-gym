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



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
        // added by ali kamel for testing & demo purposes
        // demo of charts
        // return view('users.index');
    });

Route::get('/home', 'HomeController@index')->name('home');



// gym
Route::get('/gyms', 'Gym\StoreController@index')->name('gyms.index');
Route::get('/gyms/create', 'Gym\CreateController@create')->name('gyms.create');
Route::post('/gyms','Gym\StoreController@store')->name('gyms.store');
Route::get('/gyms/{gym}/edit','Gym\EditController@edit')->name('gyms.edit');
Route::put('/gyms/{gym}','Gym\EditController@update')->name('gyms.update');
Route::delete('/gyms/{gym}','Gym\DeleteController@destroy')->name('gyms.destroy');
Route::get('/data_gyms', 'Gym\StoreController@data_gyms');


// training package
Route::get('/packages','TrainingPackage\StoreController@index')->name('packages.index');
Route::get('/packages/create', 'TrainingPackage\CreateController@create')->name('packages.create');
Route::post('/packages','TrainingPackage\StoreController@store')->name('packages.store');
Route::get('/packages/{package}/edit','TrainingPackage\EditController@edit')->name('packages.edit');
Route::put('/packages/{package}','TrainingPackage\EditController@update')->name('packages.update');
Route::delete('/packages/{package}','TrainingPackage\DeleteController@destroy')->name('packages.destroy');
Route::get('/data_packages', 'TrainingPackage\StoreController@data_packages');


// training sessions
Route::get('/sessions/create', 'TrainingSession\CreateController@create')->name('sessions.create');
Route::get('/sessions/{id}/edit', 'TrainingSession\TrainingSessionController@edit')->name('sessions.edit');
Route::post('/sessions/{id}', 'TrainingSession\TrainingSessionController@update')->name('sessions.update');
Route::post('/sessions','TrainingSession\StoreController@store')->name('sessions.store');
Route::get('/sessions','TrainingSession\TrainingSessionController@index')->name('sessions.index');
Route::get('sessionsdata', 'TrainingSession\TrainingSessionController@getdata')->name('sessions.data');
Route::delete('/sessions/{id}','TrainingSession\TrainingSessionController@destroy')->name('sessions.destroy');



// users
Route::get('/users', 'UsersController@index')->name('users.index');


// Coaches
Route::resource('coaches','Coach\CoachController');
Route::get('coachdata', 'Coach\CoachController@getdata')->name('coach.data');

// cities
Route::get('/cities', 'CitiesController@index')->name('cities.index');
Route::get('/datatable', 'CitiesController@data_table')->name('cities.datatable');
Route::get('/cities/create', 'CitiesController@create')->name('cities.create');
Route::post('/cities','CitiesController@store')->name('cities.store');
Route::get('/cities/{city}/edit', 'CitiesController@edit')->name('cities.edit');
Route::put('/cities', 'CitiesController@update')->name('cities.update');

//attendance
Route::get('/attendance','Attendance\AttendanceController@index')->name('attendance.index');
Route::get('/data_attend', 'Attendance\AttendanceController@data_attend');

//members
Route::get('/members','Member\MembersController@index')->name('members.index');
Route::get('/data_member','Member\MembersController@data_member');









Route::get('/revenue','RevenueController@index')->name('revenue.index');
Route::get('/revenue/datatable','RevenueController@dataTable')->name('revenue.datatable');











// buying packages
Route::get('/payments/create', 'Payment\PaymentController@create')->name('payment.create');
Route::post('/payments', 'Payment\PaymentController@store')->name('payment.store');



//City Managers
Route::get('/citymanagers','CityManagerController@index')->name('citymanagers.index');
Route::get('/citymanagers/create','CityManagerController@create')->name('citymanagers.create');
Route::post('/citymanagers','CityManagerController@store')->name('citymanagers.store');
Route::get('/citymanagers/{manager}','CityManagerController@show')->name('citymanagers.show');
Route::get('/citymanagers/{manager}/edit','CityManagerController@edit')->name('citymanagers.edit');
Route::put('/citymanagers/{manager}','CityManagerController@update')->name('citymanagers.update');
Route::delete('/citymanagers/{manager}','CityManagerController@destroy')->name('citymanagers.destroy');
Route::get('/citymanagersdata', 'CityManagerController@getdata')->name('citymanagers.data');


//Gym Managers
Route::get('/gymmanagers','GymManagerController@index')->name('gymmanagers.index');
Route::get('/gymmanagers/create','GymManagerController@create')->name('gymmanagers.create');
Route::post('/gymmanagers','GymManagerController@store')->name('gymmanagers.store');
Route::get('/gymmanagers/{manager}','GymManagerController@show')->name('gymmanagers.show');
Route::get('/gymmanagers/{manager}/edit','GymManagerController@edit')->name('gymmanagers.edit');
Route::put('/gymmanagers/{manager}','GymManagerController@update')->name('gymmanagers.update');
Route::delete('/gymmanagers/{manager}','GymManagerController@destroy')->name('gymmanagers.destroy');
Route::get('/gymmanagersdata', 'GymManagerController@getdata')->name('gymmanagers.data');
Route::get('/ban/{manager}','GymManagerController@ban')->name('gymmanagers.ban');
Route::get('/unban/{manager}','GymManagerController@unban')->name('gymmanagers.unban');

});




