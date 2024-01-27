<?php

use App\Http\Controllers\User\ReservationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'reservations'], function () {

    Route::get('index',[ReservationController::class,'index']);
    Route::get('{reservation}/show',[ReservationController::class,'show']);
});
