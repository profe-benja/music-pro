<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bodega\ProductoController;
use App\Http\Controllers\Bodega\UsuarioController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\HomeController;

Route::prefix('bodega')->name('bodega.')->group( function () {
  Route::get('/', [HomeController::class,'bodega'])->name('index');

  Route::get('acceso', [AuthController::class,'bodegaAcceso'])->name('acceso');
  Route::post('acceso', [AuthController::class,'bodegaLogin'])->name('acceso');

  Route::middleware('auth.user.bodega')->group( function () {
    Route::get('home', [BodegaController::class,'home'])->name('home');

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
    // Route::delete('admin/usuario/{id}', [UsuarioController::class,'destroy'])->name('admin.usuario.delete');
  });
});
