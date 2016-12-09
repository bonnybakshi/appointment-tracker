<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// optional login testing
Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump($user->toArray());
    else
        dump('You are not logged in.');

    return;
});

/**
* Appointment resource
*/
# Index page to show all the Appointments
Route::get('/appointments', 'AppointmentController@index')->name('appintments.index');
# Show a form to create a new Appointment
Route::get('/appointments/create', 'AppointmentController@create')->name('appointments.create');
# Process the form to create a new Appointment
Route::post('/appointments', 'AppointmentController@store')->name('appointments.store');
# Show an individual Appointment
Route::get('/appointments/{id}', 'AppointmentController@show')->name('appointments.show');
# Show form to edit a Appointment
Route::get('/appointments/{id}/edit', 'AppointmentController@edit')->name('appointments.edit');
# Process form to edit a Appointment
Route::put('/appointments/{id}', 'AppointmentController@update')->name('appointments.update');
# Get route to confirm deletion of Appointment
Route::get('/appointments/{id}/delete', 'AppointmentController@delete')->name('appointments.destroy');
# Delete route to actually destroy the Appointment
Route::delete('/appointments/{id}', 'AppointmentController@destroy')->name('appointments.destroy');
# The above routes *could* all be replaced with this one line:
# Route::resource('appointments', 'AppointmentController');

/**
* Client resource( Only Admin can access it)
*/
# Index page to show all the Clients
Route::get('/clients', 'ClientController@index')->name('clients.index')->middleware('admin');
# Show a form to create a new Appointment
Route::get('/clients/create', 'ClientController@create')->name('clients.create')->middleware('admin');
# Get route to confirm deletion of client
Route::get('/clients/{id}/delete', 'ClientController@delete')->name('clients.destroy')->middleware('admin');
# Delete route to actually destroy the client
Route::delete('/clients/{id}', 'ClientController@destroy')->name('clients.destroy')->middleware('admin');
# Process the form to create a new Appointment
Route::post('/clients', 'ClientController@store')->name('clients.store')->middleware('admin');


Route::get('/home', function () {
     return view('home');
 });
Route::get('/welcome', function () {
     return view('welcome');
 });
# New as of Lecture 11, just use the "book index" as the homepage
Route::get('/', 'PageController@welcome');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');

Route::get('/protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

/**
* ref: https://github.com/susanBuck/dwa15-fall2016-notes/blob/master/03_Laravel/21_Schemas_and_Migrations.md#starting-overyour-first-migrations
*/
/*if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database tracker');
        DB::statement('CREATE database tracker');

        return 'Dropped tracker; created tracker.';
    });

};*/



