<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'settings'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[SettingController::class,'index']);
    Route::get('{setting}/show',[SettingController::class,'show']);
    Route::post('store',[SettingController::class,'store']);
    Route::put('{setting}/update',[SettingController::class,'update']);
    Route::delete('{setting}/delete',[SettingController::class,'delete']);

});
