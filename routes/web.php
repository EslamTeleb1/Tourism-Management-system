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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/create_tour', function () {
    return view('createTour');
});

Route::post('/createTour', [TourController::class, 'createTour']);

Route::get('/book_tour', function(){
    return view('bookTour');
});

Route::post('/book_tour', [BookingController::class, 'store']);


