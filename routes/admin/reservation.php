<?php

use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'reservations'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[ReservationController::class,'index']);
    Route::get('{reservation}/show',[ReservationController::class,'show']);
    Route::post('store',[ReservationController::class,'store']);
    Route::put('{reservation}/update',[ReservationController::class,'update']);
    Route::delete('{reservation}/delete',[ReservationController::class,'delete']);

});
