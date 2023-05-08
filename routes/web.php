<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ConfigController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TeamController;

Route::get('/', [AuthController::class,'index'])->name('root');

Route::get('/acceso', [AuthController::class,'acceso'])->name('login');
Route::post('/acceso', [AuthController::class,'login'])->name('login');

Route::middleware('auth.user')->group( function () {
  Route::any('logout', [AuthController::class,'logout'])->name('logout');

  Route::get('admin/home', [HomeController::class,'index'])->name('home.index');

  Route::get('admin/perfil', [PerfilController::class,'index'])->name('admin.perfil.index');

  Route::get('admin/config', [ConfigController::class,'index'])->name('admin.config.index');
  Route::put('admin/config', [ConfigController::class,'update'])->name('admin.config.update');
  Route::get('admin/config/coin', [ConfigController::class,'coin'])->name('admin.config.coin');
  Route::put('admin/config/coin', [ConfigController::class,'coinUpdate'])->name('admin.config.coin');
  Route::get('admin/config/sistema', [SistemaController::class,'index'])->name('admin.sistema.index');
  Route::put('admin/config/sistema', [SistemaController::class,'update'])->name('admin.sistema.update');
  Route::put('admin/config/sistema/demo', [SistemaController::class,'demo'])->name('admin.sistema.demo');

  // Usuario
  Route::get('admin/usuario', [UsuarioController::class,'index'])->name('admin.usuario.index');
  Route::get('admin/usuario/admins', [UsuarioController::class,'admin'])->name('admin.usuario.admin');
  Route::get('admin/usuario/create', [UsuarioController::class,'create'])->name('admin.usuario.create');
  Route::post('admin/usuario', [UsuarioController::class,'store'])->name('admin.usuario.store');
  Route::get('admin/usuario/{id}', [UsuarioController::class,'show'])->name('admin.usuario.show');
  Route::get('admin/usuario/{id}/edit', [UsuarioController::class,'edit'])->name('admin.usuario.edit');
  Route::put('admin/usuario/{id}', [UsuarioController::class,'update'])->name('admin.usuario.update');
  // Route::delete('admin/usuario/{id}', [UsuarioController::class,'destroy'])->name('admin.usuario.delete');

  Route::get('admin/usuario/{id}/historial', [UsuarioController::class,'historial'])->name('admin.usuario.historial');

  Route::get('admin/solicitudes', [SolicitudController::class,'index'])->name('admin.solicitud.index');
  Route::get('admin/solicitudes/aceptados', [SolicitudController::class,'aceptados'])->name('admin.solicitud.aceptados');
  Route::get('admin/solicitudes/rechazados', [SolicitudController::class,'rechazados'])->name('admin.solicitud.rechazados');
  Route::get('admin/solicitudes/{id}', [SolicitudController::class,'show'])->name('admin.solicitud.show');
  Route::put('admin/solicitudes/{id}', [SolicitudController::class,'finished'])->name('admin.solicitud.finished');

  // Productos
  Route::get('admin/producto', [ProductoController::class,'index'])->name('admin.producto.index');
  Route::get('admin/producto/create', [ProductoController::class,'create'])->name('admin.producto.create');
  Route::post('admin/producto', [ProductoController::class,'store'])->name('admin.producto.store');
  Route::get('admin/producto/{id}', [ProductoController::class,'show'])->name('admin.producto.show');
  Route::get('admin/producto/{id}/edit', [ProductoController::class,'edit'])->name('admin.producto.edit');
  Route::put('admin/producto/{id}', [ProductoController::class,'update'])->name('admin.producto.update');
  // Route::delete('admin/producto/{id}', [AccionController::class,'destroy'])->name('admin.producto.delete');

  Route::get('admin/team', [TeamController::class,'index'])->name('admin.team.index');
  Route::get('admin/team/create', [TeamController::class,'create'])->name('admin.team.create');
  Route::post('admin/team', [TeamController::class,'store'])->name('admin.team.store');
  // Route::get('admin/team/{id}', [TeamController::class,'show'])->name('admin.team.show');
  // Route::get('admin/team/{id}/edit', [TeamController::class,'edit'])->name('admin.team.edit');
  // Route::put('admin/team/{id}', [TeamController::class,'update'])->name('admin.team.update');
  // Route::delete('admin/team/{id}', [TeamController::class,'destroy'])->name('admin.team.delete');

  Route::get('admin/report', [ReportController::class,'index'])->name('admin.report.index');

  // Route::get('admin/reset', [HomeController::class,'reset'])->name('admin.reset');


});
