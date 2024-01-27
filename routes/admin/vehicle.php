<?php

use App\Http\Controllers\Admin\VehicleController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'vehicles'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[VehicleController::class,'index']);
    Route::get('{vehicle}/show',[VehicleController::class,'show']);
    Route::post('store',[VehicleController::class,'store']);
    Route::put('{vehicle}/update',[VehicleController::class,'update']);
    Route::delete('{vehicle}/delete',[VehicleController::class,'delete']);

});
