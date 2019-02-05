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

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/bookings/create/{id}', [
   'as' => 'bookings.create', 'uses' => 'BookingsController@create'
]);

Route::any('/rooms/result/{from}&{to}', [
   'as' => 'rooms.search', 'uses' => 'RoomsController@search'
]);

Route::resources([
   'rooms' => 'RoomsController',
   'hotels' => 'HotelsController',
   'guests' => 'GuestsController',
   'bookings' => 'BookingsController'
]);

Route::get('about', function(){
   return view('pages.about');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/admin', 'AdminController@index')
    ->middleware('is_admin')
    ->name('admin');
