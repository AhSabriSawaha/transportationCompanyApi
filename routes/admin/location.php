<?php

use App\Http\Controllers\Admin\LocationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'locations'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[LocationController::class,'index']);
    Route::get('{location}/show',[LocationController::class,'show']);
    Route::post('store',[LocationController::class,'store']);
    Route::put('{location}/update',[LocationController::class,'update']);
    Route::delete('{location}/delete',[LocationController::class,'delete']);

});
