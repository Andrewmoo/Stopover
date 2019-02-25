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

Route::get('/bookings/create/{id}', [
   'as' => 'bookings.create', 'uses' => 'BookingsController@create'
]);

Route::get('/hotels/review/{id}', [
   'as' => 'reviews.create', 'uses' => 'HotelReviewsController@create'
]);

Route::get('/bookings/edit/{guest_id}/{id}', [
   'as' => 'bookings.edit',
   'uses' => 'BookingsController@edit'
]);

Route::any('/rooms/results/', [
   'as' => 'rooms.results', 'uses' => 'RoomsController@search'
]);

Route::get('/hotels/{id}/gallery', 'HotelImagesController@index')->name('hotelimages');
Route::post('hotels/{id}/gallery', 'HotelImagesController@uploadImage');
Route::delete('hotels/{id}/gallery', 'HotelImagesController@destroy');


Route::resources([
   'rooms' => 'RoomsController',
   'guests' => 'GuestsController',
]);

Route::put('/hotels/review', 'HotelReviewsController@update');

Route::resource('hotel_reviews', 'HotelReviewsController')->except([
   'edit','update'
]);

Route::resource('hotels', 'HotelsController')->except([
   'index', 'create'
]);

Route::resource('bookings', 'BookingsController')->except([
   'create', 'show'
]);

Route::get('/rooms/{id}/{from?}/{to?}', [
   'as' => 'rooms.show',
   'uses' => 'RoomsController@show'
]);

Route::get('about', function(){
   return view('pages.about');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/admin', 'AdminController@index')
    ->middleware('is_admin')
    ->name('admin');
