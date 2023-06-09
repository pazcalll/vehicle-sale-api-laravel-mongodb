<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('users/login', [UserController::class, 'login']);
Route::post('users/register', [UserController::class, 'register']);
Route::middleware('auth:api')->group(function ()
{
    Route::apiResource('bikes', BikeController::class);

    Route::apiResource('cars', CarController::class);

    Route::post('stocks/car', [StockController::class, 'storeCar']);
    Route::post('stocks/bike', [StockController::class, 'storebike']);
    Route::post('stocks/car/sell', [StockController::class, 'sellCar']);
    Route::post('stocks/bike/sell', [StockController::class, 'sellBike']);
});
