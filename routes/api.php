<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\APIErrorResponseController;
use App\Http\Controllers\API\APITestController;
use App\Http\Controllers\API\Sucursal\APIProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/product/find',[APIProductoController::class,'find'])->name('api.v1.product.find');

// TEST INICIALES
Route::get('/v1/test/saludo',[APITestController::class,'saludo'])->name('api.v1.test.saludo');
Route::get('/v1/test/saldo',[APITestController::class,'saldo'])->name('api.v1.test.saldo');
Route::any('/v1/test/parametro/{id}',[APITestController::class,'parametro'])->name('api.v1.test.parametro');

// ERROR TEST
Route::any('/v1/test/error/bad_request',[APIErrorResponseController::class,'badRequest'])->name('api.v1.test.error.badRequest');
Route::any('/v1/test/error/not_found',[APIErrorResponseController::class,'notFound'])->name('api.v1.test.error.notFound');
Route::any('/v1/test/error/unauthorized',[APIErrorResponseController::class,'unauthorized'])->name('api.v1.test.error.unauthorized');
Route::any('/v1/test/error/forbidden',[APIErrorResponseController::class,'forbidden'])->name('api.v1.test.error.forbidden');



Route::get('/v1/test/user',[APITestController::class,'index'])->name('api.v1.test.index');
