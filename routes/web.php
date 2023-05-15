<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bodega\ProductoController as BodegaProductoController;
use App\Http\Controllers\Bodega\UsuarioController as BodegaUsuarioController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ConfigController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\Sucursal\ProductoController as SucursalProductoController;
use App\Http\Controllers\Sucursal\UsuarioController as SucursalUsuarioController;
use App\Http\Controllers\Transporte\UsuarioController as TransporteUsuarioController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TransporteController;

Route::get('/', [HomeController::class,'index'])->name('root');

Route::get('tarjeta', [HomeController::class,'tarjeta'])->name('tarjeta.index');
Route::get('transporte', [HomeController::class,'transporte'])->name('transporte.index');

Route::get('tarjeta/acceso', [AuthController::class,'tarjetaAcceso'])->name('tarjeta.acceso');
Route::post('tarjeta/acceso', [AuthController::class,'tarjetaLogin'])->name('tarjeta.acceso');

Route::get('transporte/acceso', [AuthController::class,'tarjetaAcceso'])->name('trasnporte.acceso');
Route::post('transporte/acceso', [AuthController::class,'tarjetaLogin'])->name('transporte.acceso');

// GLOBAL
Route::any('logout', [AuthController::class,'logout'])->name('logout');

// BODEGA
Route::prefix('bodega')->name('bodega.')->group( function () {
  Route::get('/', [HomeController::class,'bodega'])->name('index');

  Route::get('acceso', [AuthController::class,'bodegaAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'bodegaLogin'])->name('acceso');

  Route::middleware('auth.user.bodega')->group( function () {
    Route::get('home', [BodegaController::class,'home'])->name('home');

    // Productos
    Route::get('producto', [BodegaProductoController::class,'index'])->name('producto.index');
    Route::get('producto/create', [BodegaProductoController::class,'create'])->name('producto.create');
    Route::post('producto', [BodegaProductoController::class,'store'])->name('producto.store');
    Route::get('producto/{id}', [BodegaProductoController::class,'show'])->name('producto.show');
    Route::get('producto/{id}/edit', [BodegaProductoController::class,'edit'])->name('producto.edit');
    Route::put('producto/{id}', [BodegaProductoController::class,'update'])->name('producto.update');
    // Route::delete('admin/producto/{id}', [AccionController::class,'destroy'])->name('admin.producto.delete');

    // Usuario
    Route::get('usuario', [BodegaUsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [BodegaUsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [BodegaUsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [BodegaUsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [BodegaUsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [BodegaUsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [BodegaUsuarioController::class,'update'])->name('usuario.update');
    // Route::delete('admin/usuario/{id}', [BodegaUsuarioController::class,'destroy'])->name('admin.usuario.delete');

  });
});

// SUCURSAL
Route::prefix('sucursal')->name('sucursal.')->group( function () {
  Route::get('/', [HomeController::class,'sucursal'])->name('index');

  Route::get('acceso', [AuthController::class,'sucursalAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'sucursalLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'sucursalAccesoCliente'])->name('accesocliente');
  Route::post('acceso_cliente', [AuthController::class,'sucursalLoginCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'sucursalRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'sucursalRegistroStore'])->name('acceso.registro');

  Route::middleware('auth.user.store')->group( function () {
    Route::get('home', [SucursalController::class,'home'])->name('home');

    // Productos
    Route::get('producto', [SucursalProductoController::class,'index'])->name('producto.index');
    Route::get('producto/create', [SucursalProductoController::class,'create'])->name('producto.create');
    Route::post('producto', [SucursalProductoController::class,'store'])->name('producto.store');
    Route::get('producto/{id}', [SucursalProductoController::class,'show'])->name('producto.show');
    Route::get('producto/{id}/edit', [SucursalProductoController::class,'edit'])->name('producto.edit');
    Route::put('producto/{id}', [SucursalProductoController::class,'update'])->name('producto.update');
    // Route::delete('admin/producto/{id}', [AccionController::class,'destroy'])->name('admin.producto.delete');

    // Usuario
    Route::get('usuario', [SucursalUsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [SucursalUsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [SucursalUsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [SucursalUsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [SucursalUsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [SucursalUsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [SucursalUsuarioController::class,'update'])->name('usuario.update');
    // Route::delete('admin/usuario/{id}', [BodegaUsuarioController::class,'destroy'])->name('admin.usuario.delete');
  });
});

Route::prefix('tarjeta')->name('tarjeta.')->group( function () {
  Route::get('/', [HomeController::class,'tarjeta'])->name('index');
  Route::get('acceso', [AuthController::class,'tarjetaAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'tarjetaLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'tarjetaAccesoCliente'])->name('accesocliente');
  Route::post('acceso_cliente', [AuthController::class,'tarjetaLoginCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'tarjetaRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'tarjetaRegistro'])->name('acceso.registro');

});

Route::prefix('transporte')->name('transporte.')->group( function () {
  Route::get('/', [HomeController::class,'transporte'])->name('index');
  Route::get('acceso', [AuthController::class,'transporteAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'transporteLogin'])->name('acceso');
  Route::get('acceso_cliente', [AuthController::class,'transporteAccesoCliente'])->name('accesocliente');
  Route::post('acceso_cliente', [AuthController::class,'transporteLoginCliente'])->name('accesocliente');
  Route::get('acceso_registro', [AuthController::class,'transporteRegistro'])->name('acceso.registro');
  Route::post('acceso_registro', [AuthController::class,'transporteRegistro'])->name('acceso.registro');

  Route::middleware('auth.user.transporte')->group( function () {
    Route::get('home', [TransporteController::class,'home'])->name('home');

    Route::get('usuario', [TransporteUsuarioController::class,'index'])->name('usuario.index');
    Route::get('usuario/admins', [TransporteUsuarioController::class,'admin'])->name('usuario.admin');
    Route::get('usuario/create', [TransporteUsuarioController::class,'create'])->name('usuario.create');
    Route::post('usuario', [TransporteUsuarioController::class,'store'])->name('usuario.store');
    Route::get('usuario/{id}', [TransporteUsuarioController::class,'show'])->name('usuario.show');
    Route::get('usuario/{id}/edit', [TransporteUsuarioController::class,'edit'])->name('usuario.edit');
    Route::put('usuario/{id}', [TransporteUsuarioController::class,'update'])->name('usuario.update');
  });
});
// Route::middleware('auth.user')->group( function () {
//   Route::any('logout', [AuthController::class,'logout'])->name('logout');

//   Route::get('admin/home', [HomeController::class,'index'])->name('home.index');

//   Route::get('admin/perfil', [PerfilController::class,'index'])->name('admin.perfil.index');

//   Route::get('admin/config', [ConfigController::class,'index'])->name('admin.config.index');
//   Route::put('admin/config', [ConfigController::class,'update'])->name('admin.config.update');
//   Route::get('admin/config/coin', [ConfigController::class,'coin'])->name('admin.config.coin');
//   Route::put('admin/config/coin', [ConfigController::class,'coinUpdate'])->name('admin.config.coin');
//   Route::get('admin/config/sistema', [SistemaController::class,'index'])->name('admin.sistema.index');
//   Route::put('admin/config/sistema', [SistemaController::class,'update'])->name('admin.sistema.update');
//   Route::put('admin/config/sistema/demo', [SistemaController::class,'demo'])->name('admin.sistema.demo');

//   // Usuario
//   Route::get('admin/usuario', [UsuarioController::class,'index'])->name('admin.usuario.index');
//   Route::get('admin/usuario/admins', [UsuarioController::class,'admin'])->name('admin.usuario.admin');
//   Route::get('admin/usuario/create', [UsuarioController::class,'create'])->name('admin.usuario.create');
//   Route::post('admin/usuario', [UsuarioController::class,'store'])->name('admin.usuario.store');
//   Route::get('admin/usuario/{id}', [UsuarioController::class,'show'])->name('admin.usuario.show');
//   Route::get('admin/usuario/{id}/edit', [UsuarioController::class,'edit'])->name('admin.usuario.edit');
//   Route::put('admin/usuario/{id}', [UsuarioController::class,'update'])->name('admin.usuario.update');
//   // Route::delete('admin/usuario/{id}', [UsuarioController::class,'destroy'])->name('admin.usuario.delete');

//   Route::get('admin/usuario/{id}/historial', [UsuarioController::class,'historial'])->name('admin.usuario.historial');

//   Route::get('admin/solicitudes', [SolicitudController::class,'index'])->name('admin.solicitud.index');
//   Route::get('admin/solicitudes/aceptados', [SolicitudController::class,'aceptados'])->name('admin.solicitud.aceptados');
//   Route::get('admin/solicitudes/rechazados', [SolicitudController::class,'rechazados'])->name('admin.solicitud.rechazados');
//   Route::get('admin/solicitudes/{id}', [SolicitudController::class,'show'])->name('admin.solicitud.show');
//   Route::put('admin/solicitudes/{id}', [SolicitudController::class,'finished'])->name('admin.solicitud.finished');

//   // Productos
//   Route::get('admin/producto', [ProductoController::class,'index'])->name('admin.producto.index');
//   Route::get('admin/producto/create', [ProductoController::class,'create'])->name('admin.producto.create');
//   Route::post('admin/producto', [ProductoController::class,'store'])->name('admin.producto.store');
//   Route::get('admin/producto/{id}', [ProductoController::class,'show'])->name('admin.producto.show');
//   Route::get('admin/producto/{id}/edit', [ProductoController::class,'edit'])->name('admin.producto.edit');
//   Route::put('admin/producto/{id}', [ProductoController::class,'update'])->name('admin.producto.update');
//   // Route::delete('admin/producto/{id}', [AccionController::class,'destroy'])->name('admin.producto.delete');

//   Route::get('admin/team', [TeamController::class,'index'])->name('admin.team.index');
//   Route::get('admin/team/create', [TeamController::class,'create'])->name('admin.team.create');
//   Route::post('admin/team', [TeamController::class,'store'])->name('admin.team.store');
//   // Route::get('admin/team/{id}', [TeamController::class,'show'])->name('admin.team.show');
//   // Route::get('admin/team/{id}/edit', [TeamController::class,'edit'])->name('admin.team.edit');
//   // Route::put('admin/team/{id}', [TeamController::class,'update'])->name('admin.team.update');
//   // Route::delete('admin/team/{id}', [TeamController::class,'destroy'])->name('admin.team.delete');

//   Route::get('admin/report', [ReportController::class,'index'])->name('admin.report.index');

//   // Route::get('admin/reset', [HomeController::class,'reset'])->name('admin.reset');


// });
