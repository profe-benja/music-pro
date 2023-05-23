<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\APIErrorResponseController;
use App\Http\Controllers\API\APIProductoController as APIAPIProductoController;
use App\Http\Controllers\API\APITestController;
use App\Http\Controllers\API\Bodega\APIProductoController as BodegaAPIProductoController;
use App\Http\Controllers\API\Musicpro\APIEmailController;
use App\Http\Controllers\API\Sucursal\APIProductoController;

Route::post('/product/find',[APIProductoController::class,'find'])->name('api.v1.product.find');

Route::prefix('/v1')->name('api.v1.')->group( function () {

  Route::prefix('/test')->name('test.')->group( function () {
    // TEST INICIALES
    Route::get('saludo',[APITestController::class,'saludo'])->name('saludo');
    Route::get('saldo',[APITestController::class,'saldo'])->name('saldo');
    Route::any('parametro/{id}',[APITestController::class,'parametro'])->name('parametro');

    // Route::get('user',[APITestController::class,'index'])->name('api.v1.test.index');

    // ERROR TEST
    Route::any('error/bad_request',[APIErrorResponseController::class,'badRequest'])->name('error.badRequest');
    Route::any('error/not_found',[APIErrorResponseController::class,'notFound'])->name('error.notFound');
    Route::any('error/unauthorized',[APIErrorResponseController::class,'unauthorized'])->name('error.unauthorized');
    Route::any('error/forbidden',[APIErrorResponseController::class,'forbidden'])->name('error.forbidden');
  });

  // BODEGA
  Route::any('bodega/producto',[BodegaAPIProductoController::class,'index'])->name('bodega.producto.index');


  Route::post('musicpro/send_email',[APIEmailController::class,'index'])->name('musicpro.index');
});






