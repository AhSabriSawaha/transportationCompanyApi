<?php

use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'notifications'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[NotificationController::class,'index']);
    Route::get('{notification}/show',[NotificationController::class,'show']);
    Route::post('store',[NotificationController::class,'store']);
    Route::put('{notification}/update',[NotificationController::class,'update']);
    Route::delete('{notification}/delete',[NotificationController::class,'delete']);
    
});
