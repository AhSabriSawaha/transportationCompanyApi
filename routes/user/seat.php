<?php

use App\Http\Controllers\User\SeatController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'seats'], function () {

    Route::get('index',[SeatController::class,'index']);
    Route::get('{seat}/show',[SeatController::class,'show']);
});
