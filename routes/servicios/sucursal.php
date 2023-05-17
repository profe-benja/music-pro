<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sucursal\ProductoController;
use App\Http\Controllers\Sucursal\UsuarioController;
use App\Http\Controllers\SucursalController;

Route::prefix('sucursal')->name('sucursal.')->group( function () {
  Route::get('/', [HomeController::class,'sucursal'])->name('index');

  Route::get('acceso', [AuthController::class,'sucursalAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'sucursalLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'sucursalAccesoCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'sucursalRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'sucursalRegistroStore'])->name('acceso.registro');

  Route::middleware('auth.user.store')->group( function () {
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
  });
});
