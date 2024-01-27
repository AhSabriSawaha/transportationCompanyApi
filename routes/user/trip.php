<?php

use App\Http\Controllers\User\TripController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'trips'], function () {

    Route::get('index',[TripController::class,'index']);
    Route::get('myTrips',[TripController::class,'myTrips']);
    Route::get('{trip}/show',[TripController::class,'show']);
});
