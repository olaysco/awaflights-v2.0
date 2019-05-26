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

/**
 * Admin auth
 */
Route::get('/login', function(){ return view('admin.login'); })->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

 /**
  * Flight Route
  */
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/about', function () { return view('about-us'); })->name('about');
Route::get('/hotels', function (){ return view('hotels');})->name('hotels');
Route::get('/flights', function (){ return view('flights');})->name('flights');
Route::get('/contact', function () { return view('contact-us'); })->name('contact');
Route::post('fetch', 'FlightController@fetchAirport');
Route::get('fetch', 'FlightController@fetchAirport');
Route::post('/home', 'FlightController@processRequest');
Route::post('/flights', 'FlightController@processRequest');
Route::get('/complete', function(){ return view('complete-flight'); })->name('complete');
Route::post('/complete-booking', 'FlightController@completeBooking');
Route::get('/flights-book','FlightController@getBookingForm' );


/**
 * Routes for hotels
 */
Route::get('/hotel-location', 'HotelController@fetchHotelLocation');
Route::post('/hotel-search', 'HotelController@searchHotel')->name('hotel-search');

/**
 * 
 * Routes for admin
 */
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard','AdminController@index');
	Route::get('/dashboard/flight/{flight}', 'AdminController@getFlightDetail');
	Route::get('/dashboard/flight', 'AdminController@getFlightDetails');
	Route::get('/dashboard/issueTicket', 'AdminController@issueTicketForm');	
	Route::post('/dashboard/issueTicket', 'AdminController@issueTicket');
	Route::get('/dashboard/cancelBooking/{flight}', 'AdminController@cancelBooking');
	Route::get('/dashboard/checkReservation', 'AdminController@checkReservationForm');
	Route::post('/dashboard/checkReservation', 'AdminController@checkReservation');
	Route::post('/dashboard/saveflight', 'AdminController@saveFlightStatus');
});



