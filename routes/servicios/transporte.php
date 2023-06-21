<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Transporte\EncomiendaController;
use App\Http\Controllers\Transporte\TenantController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\Transporte\UsuarioController;

Route::prefix('transporte')->name('transporte.')->group( function () {
  Route::get('/', [HomeController::class,'transporte'])->name('index');
  Route::get('acceso', [AuthController::class,'transporteAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'transporteLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'transporteAccesoCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'transporteRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'transporteRegistroStore'])->name('acceso.registro');
  Route::get('seguimiento/{codigo}', [HomeController::class,'transporteSeguimiento'])->name('seguimiento');

  Route::middleware('auth.user.transporte')->group( function () {
    Route::get('home', [TransporteController::class,'home'])->name('home');

    Route::get('usuario', [UsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [UsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [UsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [UsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [UsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [UsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [UsuarioController::class,'update'])->name('usuario.update');

    Route::get('tenant', [TenantController::class,'index'])->name('tenant.index');
    Route::get('tenant/create', [TenantController::class,'create'])->name('tenant.create');
    Route::post('tenant', [TenantController::class,'store'])->name('tenant.store');
    Route::get('tenant/{id}', [TenantController::class,'show'])->name('tenant.show');
    Route::get('tenant/{id}/edit', [TenantController::class,'edit'])->name('tenant.edit');
    Route::put('tenant/{id}', [TenantController::class,'update'])->name('tenant.update');


    Route::get('encomienda', [EncomiendaController::class,'index'])->name('encomienda.index');
    Route::get('encomienda/en_proceso', [EncomiendaController::class,'indexProceso'])->name('encomienda.en_proceso');
    Route::get('encomienda/en_camino', [EncomiendaController::class,'indexEnCamino'])->name('encomienda.en_camino');
    Route::get('encomienda/entregado', [EncomiendaController::class,'indexEntregado'])->name('encomienda.entregado');
    Route::get('encomienda/create', [EncomiendaController::class,'create'])->name('encomienda.create');
    Route::get('encomienda/{code}/show', [EncomiendaController::class,'show'])->name('encomienda.show');
    Route::put('encomienda/{code}', [EncomiendaController::class,'update'])->name('encomienda.update');
    Route::post('encomienda', [EncomiendaController::class,'store'])->name('encomienda.store');

  });
});
