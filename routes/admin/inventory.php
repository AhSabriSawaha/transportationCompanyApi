<?php

use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'inventories'/*, 'middleware' => 'auth:api'*/], function () {

    Route::get('index',[ReservationController::class,'getInventory']);

});
