<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Tarjeta\Admin\AdminController;
use App\Http\Controllers\Tarjeta\Admin\BancoController;
use App\Http\Controllers\Tarjeta\Admin\TarjetaController;
use App\Http\Controllers\Tarjeta\Admin\UsuarioController;
use App\Http\Controllers\Tarjeta\App\AppController;
// use App\Http\Controllers\Tarjeta\TarjetaController;

Route::prefix('tarjeta')->name('tarjeta.')->group( function () {
  Route::get('/', [HomeController::class,'tarjeta'])->name('index');
  Route::get('acceso', [AuthController::class,'tarjetaAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'tarjetaLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'tarjetaAccesoCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'tarjetaRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'tarjetaRegistroStore'])->name('acceso.registro');



  Route::middleware('auth.user.card')->prefix('app')->name('app.')->group( function () {
    Route::get('/', [AppController::class,'index'])->name('index');
    Route::post('/recargar', [AppController::class,'recargar'])->name('recargar');
  });

  // CALLBACK DE RECARGA
  Route::any('app/recarga/callback', [AppController::class,'callbackRecarga'])->name('app.recarga.callback');

  Route::middleware('auth.user.card')->prefix('admin')->name('admin.')->group( function () {
    Route::get('/', [AdminController::class,'index'])->name('index');

    // Usuario
    Route::get('usuario', [UsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [UsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [UsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [UsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [UsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [UsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [UsuarioController::class,'update'])->name('usuario.update');


    Route::get('tarjeta', [TarjetaController::class,'index'])->name('tarjeta.index');
    Route::get('tarjeta/{id}', [TarjetaController::class,'show'])->name('tarjeta.show');

    Route::get('banco', [BancoController::class,'index'])->name('banco.index');
    Route::get('banco/create', [BancoController::class,'create'])->name('banco.create');
    Route::post('banco', [BancoController::class,'store'])->name('banco.store');
    Route::get('banco/{id}', [BancoController::class,'show'])->name('banco.show');

  });
});
