<?php

use App\Http\Controllers\Admin\SeatController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'seats'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[SeatController::class,'index']);
    Route::get('{seat}/show',[SeatController::class,'show']);
    Route::post('store',[SeatController::class,'store']);
    Route::put('{seat}/update',[SeatController::class,'update']);
    Route::delete('{seat}/delete',[SeatController::class,'delete']);

});
