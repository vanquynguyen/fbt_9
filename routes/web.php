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
    return view('sides.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/about', function () {
    return view('sides.about');
})->name('about');

Route::get('/gallery', function () {
    return view('sides.gallery');
})->name('gallery');

Route::get('/tours', function () {
    return view('sides.tours');
})->name('tours');

Route::get('/blog', function () {
    return view('sides.blog');
})->name('blog');
//Tour
Route::get('tours', 'TourController@index')->name('tours');
Route::get('tour/{id}/detail', 'TourController@show')->name('tour.detail');

Route::group(['middleware' => 'auth'], function () {
    Route::get('tour/{id}/booking', 'BookingController@index')->name('booking.index');
    Route::post('tour/{id}/booking/payment', 'BookingController@store')->name('booking.payment');
    Route::get('calculate', 'BookingController@calculate')->name('booking.calculate');
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    //Manage Users
    Route::resource('user', 'UserController');
    //Manage Categories
    Route::resource('category', 'CategoryController');
    //Manage Tours
    Route::resource('tour', 'TourController');
    Route::resource('itinerary', 'ItineraryController');
    Route::get('tour/{id}/itinerary/create', 'ItineraryController@createItineraryTour')->name('itinerary.createTour');
    Route::get('tour/{id}/itineraries', 'ItineraryController@itinerariesTour')->name('itineraries.tour');
});
