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

Route::post('/v1/test/saludo',[APIErrorResponseController::class,'saludo'])->name('api.v1.test.saludo');
Route::post('/v1/test/adios',[APITestController::class,'adios'])->name('api.v1.test.adios');
