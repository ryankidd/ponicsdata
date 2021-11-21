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
Route::post('/logout', [AuthController::class, 'logout']);  // Put behind auth.

// Devices.
Route::get('/devices', [DeviceController::class, 'index']);
Route::get('/devices/{id}', [DeviceController::class, 'show']);
Route::post('/devices', [DeviceController::class, 'store']); // Put behind auth.
Route::put('/devices/{id}', [DeviceController::class, 'update']); // Put behind auth.
Route::delete('/devices/{id}', [DeviceController::class, 'destroy']); // Put behind auth.

// Readings.
Route::get('/readings', [ReadingController::class, 'index']);
Route::get('/readings/{id}', [ReadingController::class, 'show']);
Route::put('/readings/{id}', [ReadingController::class, 'update']);  // Put behind auth.
Route::delete('/readings/{id}', [ReadingController::class, 'destroy']);  // Put behind auth.


// Protected routes WHEN  we can use authentication with the sensors, move API routes here.
Route::group(['middleware' => ['auth:sanctum']], function () {
});

Route::group(['middleware' => ['request.logging']], function () {
    Route::post('/readings', [ReadingController::class, 'store']);
});
