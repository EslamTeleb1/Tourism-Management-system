<?php
use  App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use  App\Http\Controllers\TourController;
use  App\Http\Controllers\BookingController;

Route::apiResource('tour', 'TourController');
Route::apiResource('booking', 'BookingController');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
