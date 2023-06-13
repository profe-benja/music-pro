<?php

namespace App\Http\Controllers\API\Bodega;

use App\Http\Controllers\Controller;
use App\Models\Bodega\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APIProductoController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/v1/bodega/producto",
   *     summary="Obtener el listado de productos",
   *     description="Obtener el listado de productos",
   *     operationId="bodega_producto",
   *     tags={"Bodega"},
   *     @OA\Response(
   *         response=200,
   *         description="",
   *         @OA\JsonContent(
   *            @OA\Property(property="message", type="string", example="Hola como estas"),
   *        )
   *    )
   * )
   */
  public function index()
  {
    // if ($_GET['token'] == 1234) {

      $productos = Producto::get();

      $array_productos = [];

      foreach ($productos as $key => $p) {
        array_push($array_productos, $p->getRawInfo());
      }

      $response = [
        'message' => 'correcto',
        'productos' => $array_productos
      ];
      return response()->json($response, 200);
    // }
    // return response()->json(['code' => 'nada'], 404);

  }
}
