<?php

use App\Http\Controllers\User\NotificationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'notifications'], function () {

    Route::get('index',[NotificationController::class,'index']);
    Route::get('{notification}/show',[NotificationController::class,'show']);
});
