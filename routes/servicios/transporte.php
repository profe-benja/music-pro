<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\Transporte\UsuarioController;

Route::prefix('transporte')->name('transporte.')->group( function () {
  Route::get('/', [HomeController::class,'transporte'])->name('index');
  Route::get('acceso', [AuthController::class,'transporteAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'transporteLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'transporteAccesoCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'transporteRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'transporteRegistroStore'])->name('acceso.registro');

  Route::middleware('auth.user.transporte')->group( function () {
    Route::get('home', [TransporteController::class,'home'])->name('home');

    Route::get('usuario', [UsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [UsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [UsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [UsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [UsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [UsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [UsuarioController::class,'update'])->name('usuario.update');
  });
});
