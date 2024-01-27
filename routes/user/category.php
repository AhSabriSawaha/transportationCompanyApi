<?php

use App\Http\Controllers\User\CategoryController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'categories'], function () {

    Route::get('index',[CategoryController::class,'index']);
    Route::get('{category}/show',[CategoryController::class,'show']);
});
