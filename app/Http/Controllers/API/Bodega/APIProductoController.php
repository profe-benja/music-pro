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


    /**
   * @OA\Get(
   *     path="/api/v1/bodega/solicitud",
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


  /**
   * @OA\Post(
   *     path="/api/v1/bodega/solicitud",
   *     summary="Recibe los productos seleccionados",
   *     description="Recibe el listado de producto que quiere la bodega o sucursal",
   *     operationId="bodega_solicitud",
   *     tags={"Bodega"},
   *     @OA\RequestBody(
   *         @OA\JsonContent(),
   *         @OA\MediaType(
   *            mediaType="multipart/form-data",
   *            @OA\Schema(
   *               type="object",
   *               required={"nombre_empresa", "direccion_empresa", "productos"},
   *               @OA\Property(property="nombre_empresa", type="text", example="Gosh SHOP", description=""),
   *               @OA\Property(property="direccion_empresa", type="text", example="av 123", description="Correo destino del correo electronico"),
   *               @OA\Property(property="productos", type="json",  example="{{  }}", description=""),
   *            ),
   *        ),
   *    ),
   *     @OA\Response(
   *         response=404,
   *         description="",
   *         @OA\JsonContent(
   *            @OA\Property(property="message", type="string", example="Error. Algo inesperado ha ocurrido"),
   *        )
   *    ),
   *     @OA\Response(
   *         response=200,
   *         description="",
   *         @OA\JsonContent(
   *            @OA\Property(property="message", type="string", example="Se ha enviado correctamente"),
   *        )
   *    )
   * )
   */
  public function solicitud()
  {
    // if ($_GET['token'] == 1234) {

      // $productos = Producto::get();

      // $array_productos = [];

      // foreach ($productos as $key => $p) {
      //   array_push($array_productos, $p->getRawInfo());
      // }

      $response = [
        'message' => 'correcto',
        'contenido' => 'Se ha generado la orden correctamente'
      ];
      return response()->json($response, 200);
    // }
    // return response()->json(['code' => 'nada'], 404);

  }


}
