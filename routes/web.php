<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers;

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
use  App\Http\Controllers\TourController;
use  App\Http\Controllers\BookingController;
use  App\Http\Controllers\LocalizationController;



Route::get('/', function(){
    return view('showTours');
})->name("home");
Route::get('change', [LocalizationController::class,'lang_change'])->name('LangChange');

Route::get('/create_tour', function () {
    return view('createTour');
});

Route::get('/show_tour/{slug}',[TourController::class, 'show']);

Route::post('/createTour', [TourController::class, 'createTour'])->middleware('auth');

Route::get('/book_tour', function(){
    return view('bookTour');
});

Route::post('/book_tour', [BookingController::class, 'store']);

Route::get('/bookings', function(){
    return view('bookings');
});

Route::get('/update_booked_tour', function(){
    return view('updateBooked');
});
Route::post('/update_booked_tour/{id}',[BookingController::class, 'update']);

Route::get('/tours', function(){
    return view('tours');
})->middleware('auth');

Route::get('/update_tour', function(){
    return view('updateTour');
});
Route::post('/updateTour/{id}', [TourController::class, 'update']);

Route::post('/del_booked/{id}', [BookingController::class, 'destroy']);

Route::post('/del_tour/{id}', [TourController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
