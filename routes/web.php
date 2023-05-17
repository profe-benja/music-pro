<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description"
 * )
 *
 */
Route::get('/', [HomeController::class,'index'])->name('root');

Route::get('tarjeta', [HomeController::class,'tarjeta'])->name('tarjeta.index');
Route::get('transporte', [HomeController::class,'transporte'])->name('transporte.index');

Route::get('tarjeta/acceso', [AuthController::class,'tarjetaAcceso'])->name('tarjeta.acceso');
Route::post('tarjeta/acceso', [AuthController::class,'tarjetaLogin'])->name('tarjeta.acceso');

Route::get('transporte/acceso', [AuthController::class,'tarjetaAcceso'])->name('trasnporte.acceso');
Route::post('transporte/acceso', [AuthController::class,'tarjetaLogin'])->name('transporte.acceso');

// GLOBAL
Route::any('logout', [AuthController::class,'logout'])->name('logout');
