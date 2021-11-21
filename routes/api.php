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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/devices', [DeviceController::class, 'index']);
Route::get('/devices/{id}', [DeviceController::class, 'show']);
Route::get('/readings', [ReadingController::class, 'index']);
Route::get('/readings/{id}', [ReadingController::class, 'show']);
Route::post('/readings', [ReadingController::class, 'store']);
Route::put('/readings/{id}', [ReadingController::class, 'update']);
Route::delete('/readings/{id}', [ReadingController::class, 'destroy']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/devices', [DeviceController::class, 'store']);
    Route::put('/devices/{id}', [DeviceController::class, 'update']);
    Route::delete('/devices/{id}', [DeviceController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('request.logging')->post('/hello', function() {
    return response(['message' => 'Hi, how are you?']);
});