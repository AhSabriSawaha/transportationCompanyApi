<?php

use App\Http\Controllers\User\LocationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'locations'], function () {

    Route::get('index',[LocationController::class,'index']);
    Route::get('{location}/show',[LocationController::class,'show']);
});
