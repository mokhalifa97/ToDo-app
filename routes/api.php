<?php

use App\Http\Controllers\Api\ProfileController as ApiProfileController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::get('/profile',[ApiProfileController::class,'index']);
    Route::get('/show/{id}',[ApiProfileController::class,'show']);
    Route::post('/delete',[ApiProfileController::class,'delete']);
    Route::post('/update',[ApiProfileController::class,'update']);
    Route::post('/create',[ApiProfileController::class,'create']);
});
