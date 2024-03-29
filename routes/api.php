<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\APIErrorResponseController;
use App\Http\Controllers\API\APIProductoController as APIAPIProductoController;
use App\Http\Controllers\API\APITestController;
use App\Http\Controllers\API\Bodega\APIProductoController as BodegaAPIProductoController;
use App\Http\Controllers\API\Musicpro\APIEmailController;
use App\Http\Controllers\API\Sucursal\APIProductoController;
use App\Http\Controllers\API\Transporte\APITransporteController;

Route::post('/product/find',[APIProductoController::class,'find'])->name('api.v1.product.find');

Route::prefix('/v1')->name('api.v1.')->group( function () {

  Route::prefix('/test')->name('test.')->group( function () {

    //Test params
    Route::any('response',[APITestController::class,'providerResponse'])->name('providerResponse');
    Route::any('response/{id}',[APITestController::class,'providerResponseGet'])->name('providerResponseGet');

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
  Route::get('bodega/producto',[BodegaAPIProductoController::class,'index'])->name('bodega.producto.index');
  Route::post('bodega/solicitud',[BodegaAPIProductoController::class,'solicitud'])->name('bodega.solicitud.index');


  Route::post('musicpro/send_email',[APIEmailController::class,'index'])->name('musicpro.index');


  // TRANSPORTE
  Route::any('transporte/seguimiento/{codigo}',[APITransporteController::class,'seguimiento'])->name('transporte.seguimiento');
  Route::post('transporte/solicitud',[APITransporteController::class,'solicitud'])->name('transporte.solicitud');


});


Route::get('doc',function() {
  return redirect('api/documentation');
})->name('api.doc');


