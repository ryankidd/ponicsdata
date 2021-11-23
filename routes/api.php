<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\AuthController;
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

// Public routes

// User Actions
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Devices.
Route::get('/devices', [DeviceController::class, 'index']);
Route::get('/devices/{id}', [DeviceController::class, 'show']);

// Readings.
Route::get('/readings', [ReadingController::class, 'index']);
Route::get('/readings/{id}', [ReadingController::class, 'show']);


/**
 * Put these routes behind auth when possible.
 * -------------------------------------------------- ***
 */

// User Actions.
Route::post('/logout', [AuthController::class, 'logout']);

// Devices.
Route::post('/devices', [DeviceController::class, 'store']);
Route::put('/devices/{id}', [DeviceController::class, 'update']);
Route::delete('/devices/{id}', [DeviceController::class, 'destroy']);

// Readings.
Route::put('/readings/{id}', [ReadingController::class, 'update']);
Route::delete('/readings/{id}', [ReadingController::class, 'destroy']);

/**
 * -------------------------------------------------- ***
 */

// If not, we can add routes here to have them log request data.
// Route::group(['middleware' => ['auth:sanctum', 'request.logging']], function () {
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Rooms.
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/rooms/{id}', [RoomController::class, 'show']);
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::put('/rooms/{id}', [RoomController::class, 'update']);
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);
});

Route::group(['middleware' => ['request.logging']], function () {
    Route::post('/readings', [ReadingController::class, 'store']);
});
