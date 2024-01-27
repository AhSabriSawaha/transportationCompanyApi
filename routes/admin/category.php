<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'categories'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[CategoryController::class,'index']);
    Route::get('{category}/show',[CategoryController::class,'show']);
    Route::post('store',[CategoryController::class,'store']);
    Route::put('{category}/update',[CategoryController::class,'update']);
    Route::delete('{category}/delete',[CategoryController::class,'delete']);

});
