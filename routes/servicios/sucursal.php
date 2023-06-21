<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sucursal\BoletaController;
use App\Http\Controllers\Sucursal\IntegracionController;
use App\Http\Controllers\Sucursal\ProductoController;
use App\Http\Controllers\Sucursal\UsuarioController;
use App\Http\Controllers\SucursalController;

Route::prefix('sucursal')->name('sucursal.')->group( function () {
  Route::get('/', [HomeController::class,'sucursal'])->name('index');
  Route::get('pago', [HomeController::class,'sucursalPago'])->name('pago');
  Route::post('pago', [HomeController::class,'sucursalPagoStore'])->name('pago.store');

  //CALLBACKS
  Route::any('pago/recibo/{id}', [HomeController::class,'sucursalPagoRecibo'])->name('pago.recibo');
  // Route::get('pago/recibo', [HomeController::class,'sucursalPagoRecibido'])->name('pago.recibo');

  Route::get('acceso', [AuthController::class,'sucursalAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'sucursalLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'sucursalAccesoCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'sucursalRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'sucursalRegistroStore'])->name('acceso.registro');

  Route::middleware('auth.user.store.admin')->group( function () {
    Route::get('home', [SucursalController::class,'home'])->name('home');

    // Productos
    Route::get('producto', [ProductoController::class,'index'])->name('producto.index');
    Route::get('producto/create', [ProductoController::class,'create'])->name('producto.create');
    Route::post('producto', [ProductoController::class,'store'])->name('producto.store');
    Route::get('producto/{id}', [ProductoController::class,'show'])->name('producto.show');
    Route::get('producto/{id}/edit', [ProductoController::class,'edit'])->name('producto.edit');
    Route::put('producto/{id}', [ProductoController::class,'update'])->name('producto.update');
    // Route::delete('admin/producto/{id}', [AccionController::class,'destroy'])->name('admin.producto.delete');

    // Usuario
    Route::get('usuario', [UsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [UsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [UsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [UsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [UsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [UsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [UsuarioController::class,'update'])->name('usuario.update');
    // Route::delete('admin/usuario/{id}', [BodegaUsuarioController::class,'destroy'])->name('admin.usuario.delete');

    Route::get('boleta', [BoletaController::class,'index'])->name('boleta.index');
    Route::get('boleta/{id}', [BoletaController::class,'show'])->name('boleta.show');
    Route::put('boleta/{id}', [BoletaController::class,'update'])->name('boleta.update');



    Route::get('integracion', [IntegracionController::class,'index'])->name('integracion.index');
    Route::get('integracion/tarjeta', [IntegracionController::class,'tarjeta'])->name('integracion.tarjeta');
    Route::get('integracion/tarjeta/create', [IntegracionController::class,'tarjeta'])->name('integracion.tarjeta.create');
    Route::get('integracion/bodega', [IntegracionController::class,'bodega'])->name('integracion.bodega');
    Route::get('integracion/bodega/create', [IntegracionController::class,'bodegaCreate'])->name('integracion.bodega.create');
    Route::get('integracion/transporte', [IntegracionController::class,'transporte'])->name('integracion.transporte');

    Route::get('integracion/bodega/musicpro', [IntegracionController::class,'bodegaMusicpro'])->name('integracion.bodega.musicpro');

  });
});
