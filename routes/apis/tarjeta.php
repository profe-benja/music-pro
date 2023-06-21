<?php

use App\Http\Controllers\API\Tarjeta\APITransaccionController;
use Illuminate\Support\Facades\Route;

// api/v1/tarjeta
Route::prefix('/v1/tarjeta')->name('api.v1.tarjeta.')->group( function () {

  Route::get('transferir_get',[APITransaccionController::class,'transferir_get'])->name('transferir_get');
  Route::post('transferir_get',[APITransaccionController::class,'transaccion'])->name('transaccion');

});


