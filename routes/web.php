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
* Client resource
*/
# Index page to show all the Clients
Route::get('/clients', 'ClientController@index')->name('clients.index');
# Show a form to create a new Appointment
Route::get('/clients/create', 'ClientController@create')->name('clients.create');
# Get route to confirm deletion of client
Route::get('/clients/{id}/delete', 'ClientController@delete')->name('clients.destroy');
# Delete route to actually destroy the client
Route::delete('/clients/{id}', 'ClientController@destroy')->name('clients.destroy');
# Process the form to create a new Appointment
Route::post('/clients', 'ClientController@store')->name('clients.store');


Route::get('/', function () {
    return view('welcome');
});

