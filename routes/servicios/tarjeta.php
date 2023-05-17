<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;

Route::prefix('tarjeta')->name('tarjeta.')->group( function () {
  Route::get('/', [HomeController::class,'tarjeta'])->name('index');
  Route::get('acceso', [AuthController::class,'tarjetaAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'tarjetaLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'tarjetaAccesoCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'tarjetaRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'tarjetaRegistroStore'])->name('acceso.registro');

});
