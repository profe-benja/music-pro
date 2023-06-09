<?php

use App\Http\Controllers\API\Tarjeta\APITransaccionController;
use Illuminate\Support\Facades\Route;

// api/v1/tarjeta
Route::prefix('/v1/tarjeta')->name('api.v1.tarjeta.')->group( function () {

  Route::get('transferir_get',[APITransaccionController::class,'transferir_get'])->name('transferir_get');
  Route::post('transferir_get',[APITransaccionController::class,'transaccion'])->name('transaccion');



  Route::post('transferir',[APITransaccionController::class,'transferir'])->name('transferir');
  Route::any('/{nro}/transacciones',[APITransaccionController::class,'transacciones'])->name('transacciones');
  Route::any('/{nro}',[APITransaccionController::class,'show'])->name('show');


});


