<?php

use App\Http\Controllers\User\SettingController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'settings'], function () {

    Route::get('index',[SettingController::class,'index']);
    Route::get('{setting}/show',[SettingController::class,'show']);

});
