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
Route::get('/about', [
   'as' => 'pages.about',
   'uses' => 'PagesController@about'
]);
Route::get('/services', 'PagesController@services');

Route::get('/bookings/create/{id}', [
   'as' => 'bookings.create', 'uses' => 'BookingsController@create'
]);

Route::any('/rooms/results/', [
   'as' => 'rooms.results', 'uses' => 'RoomsController@search'
]);

Route::resources([
   'rooms' => 'RoomsController',
   'hotels' => 'HotelsController',
   'guests' => 'GuestsController',
   'bookings' => 'BookingsController'
]);

// Route::get('/map', function () {
//    Mapper::map(
//       53.3,
//       -1.4,
//       [
//          'zoom' => 16,
//          'draggable' => true,
//          'marker' => false,
//          'eventAfterLoad' => 'circleListener(maps[0].shapes[0].circle_0);'
//       ]
//    );
//    print '<div style="height: 400px; width:400px;">';
//    print Mapper::render();
//    print '</div>';
// });

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/admin', 'AdminController@index')
    ->middleware('is_admin')
    ->name('admin');
