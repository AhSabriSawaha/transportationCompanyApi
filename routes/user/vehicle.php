<?php

use App\Http\Controllers\User\VehicleController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'vehicles'], function () {

    Route::get('index',[VehicleController::class,'index']);
    Route::get('{vehicle}/show',[VehicleController::class,'show']);
});
