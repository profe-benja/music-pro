<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DemoMailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransbankController;

Route::get('/', [HomeController::class,'index'])->name('root');

Route::get('tarjeta', [HomeController::class,'tarjeta'])->name('tarjeta.index');
Route::get('transporte', [HomeController::class,'transporte'])->name('transporte.index');

Route::get('tarjeta/acceso', [AuthController::class,'tarjetaAcceso'])->name('tarjeta.acceso');
Route::post('tarjeta/acceso', [AuthController::class,'tarjetaLogin'])->name('tarjeta.acceso');
Route::get('tarjeta/acceso_reset', [AuthController::class,'tarjetaReset'])->name('tarjeta.reset');
Route::post('tarjeta/acceso_reset', [AuthController::class,'tarjetaResetRequest'])->name('tarjeta.reset');

Route::get('transporte/acceso', [AuthController::class,'tarjetaAcceso'])->name('trasnporte.acceso');
Route::post('transporte/acceso', [AuthController::class,'tarjetaLogin'])->name('transporte.acceso');

// GLOBAL
Route::any('logout', [AuthController::class,'logout'])->name('logout');


Route::get('pago', [TransbankController::class, 'pagar'])->name('pago.index');
Route::any('pago/callback', [TransbankController::class, 'callback'])->name('pago.callback');


// Route::get('integracion', [HomeController::class,'integracion']);
// Route::get('demo', [DemoMailController::class,'index']);


route::get('test-pay', [HomeController::class,'testPay']);
