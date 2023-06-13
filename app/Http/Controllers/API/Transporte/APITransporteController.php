<?php

namespace App\Http\Controllers\API\Transporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Transporte\Solicitud;


class APITransporteController extends Controller
{

  /**
   * @OA\Get(
   *     path="/api/v1/transporte/seguimiento/{codigo_seguimiento}",
   *     summary="Obtener información de la encomienda",
   *     description="Obtiene detalles de la encomienda",
   *     operationId="seguimiento",
   *     tags={"Transporte"},
   *     @OA\Parameter(
   *         name="codigo_seguimiento",
   *         in="path",
   *         description="Codigo seguimiento de la encomienda",
   *         required=true,
   *         @OA\Schema(
   *             type="string",
   *             example="00000MUSICPRO999999"
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Información del usuario obtenida exitosamente"
   *     ),
   *     @OA\Response(
   *         response=404,
   *         description="No se encontro encomienda"
   *     )
   * )
   */
  public function seguimiento($codigo) {
    try {
      $s = Solicitud::where('codigo_seguimiento', $codigo)->firstOrFail();

      $response = array(
        'status'  => 200,
        'result' => array(
          'estado'    => $s->getEstado(),
          'solicitud' => $s->get_raw_info(),
        )
      );

    } catch (\Throwable $th) {
      $response = array(
        'status'  => 404,
        'result' => array(
          'message'    => 'No se encontro encomienda',
        )
      );
    }

    return response()->json($response, $response['status']);
  }

  /**
   * @OA\Post(
   *     path="/api/v1/transporte/solicitud",
   *     summary="Envia una solicitud de transporte",
   *     description="Envia una solicitud de transporte",
   *     operationId="transporte_solicitud",
   *     tags={"Transporte"},
   *     @OA\RequestBody(
   *         @OA\JsonContent(
   *               type="object",
   *               required={"asunto", "correo", "contenido"},
   *               @OA\Property(property="nombre_origen", type="text", example="Mario Perez"),
   *               @OA\Property(property="direccion_origen", type="text", example="Av 1 de mayo # 1-1"),
   *               @OA\Property(property="nombre_destino", type="text",  example="Marcela Torres"),
   *               @OA\Property(property="direccion_destino", type="text",  example="Calle 1 # 1-1"),
   *               @OA\Property(property="comentario", type="text",  example="Envio de documentos"),
   *               @OA\Property(property="info", type="json",  example=""),
   *        ),
   *     ),
   *     @OA\Response(
   *         response=400,
   *         description="Error al crear la solicitud",
   *         @OA\JsonContent(
   *            @OA\Property(property="status", type="int", example="400"),
   *            @OA\Property(property="message", type="string", example="error"),
   *            @OA\Property(property="codigo_seguimiento", type="string", example="problemas al crear la solicitud"),
   *       )
   *    ),
   *     @OA\Response(
   *         response=201,
   *         description="Se creo correctamente la solicitud",
   *         @OA\JsonContent(
   *            @OA\Property(property="status", type="int", example="201"),
   *            @OA\Property(property="message", type="string", example="correcto"),
   *            @OA\Property(property="error", type="string", example="00000MUSICPRO99999"),
   *        )
   *    )
   * )
   */
  public function solicitud(Request $request) {
    try {
      $s = new Solicitud();
      $s->codigo_seguimiento = substr(time(), 1, 5) . 'MUSICPRO' . rand(100000, 999999);
      $s->nombre_origen = $request->nombre_origen;
      $s->direccion_origen = $request->direccion_origen;
      $s->nombre_destino = $request->nombre_destino;
      $s->direccion_destino = $request->direccion_destino;
      $s->comentario = $request->comentario;
      $s->info = $request->info;
      $s->save();

      $response = [
        'status' => 201,
        'message' => 'correcto',
        'codigo_seguimiento' => $s->codigo_seguimiento
      ];
    } catch (\Throwable $th) {
      $response = [
        'status' => 400,
        'message' => 'error',
        'error' => $th->getMessage()
      ];
    }

    return response()->json($response, $response['status']);
  }
}
