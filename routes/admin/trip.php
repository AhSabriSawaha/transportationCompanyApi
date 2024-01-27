<?php

use App\Http\Controllers\Admin\TripController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'trips'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[TripController::class,'index']);
    Route::get('{trip}/show',[TripController::class,'show']);
    Route::post('store',[TripController::class,'store']);
    Route::put('{trip}/update',[TripController::class,'update']);
    Route::delete('{trip}/delete',[TripController::class,'delete']);

});
