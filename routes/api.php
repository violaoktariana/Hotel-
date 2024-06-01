<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\HotelFacilitiesController;
use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\RoomFacilitiesController;
use App\Models\RoomFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/login', function () {
    return response()->json([
        "status" => false,
        "message" => "invalid credential"
    ], 401);
})->name('login');


Route::post('/login', [AuthApiController::class, 'loginUser']);
Route::post('/register', [AuthApiController::class, 'registerUser']);
Route::middleware('auth:api')->group(
    function () {
        Route::get('/rooms', [RoomApiController::class, 'index']);
        Route::post('/rooms', [RoomApiController::class, 'store']);
        Route::put('/rooms{room}', [RoomApiController::class, 'store']);
        Route::get('/rooms/{room}', [RoomApiController::class, 'show']);
        Route::get('/rooms/facilities', [RoomFacilitiesController::class, 'index']);
        Route::get('/hotel/facilities', [HotelFacilitiesController::class, 'index']);
        Route::get('/logout', [AuthApiController::class, 'logout']);
    }
);
