<?php

namespace App\Http\Controllers\API\Musicpro;

use App\Http\Controllers\Controller;
use App\Mail\DemoMail;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class APIEmailController extends Controller
{
  /**
   * @OA\Post(
   *     path="/api/v1/musicpro/send_email",
   *     summary="Envia un correo electronico",
   *     description="Envia correco electronico",
   *     operationId="send_email",
   *     tags={"Musicpro"},
   *     @OA\RequestBody(
   *         @OA\JsonContent(),
   *         @OA\MediaType(
   *            mediaType="multipart/form-data",
   *            @OA\Schema(
   *               type="object",
   *               required={"asunto", "correo", "contenido"},
   *               @OA\Property(property="asunto", type="text", example="Correo muy importante", description="Asunto del correo electronico"),
   *               @OA\Property(property="correo", type="text", example="bej.mora@profesor.duoc.cl", description="Correo destino del correo electronico"),
   *               @OA\Property(property="contenido", type="text",  example="Este es un musicpro mensaje", description="Contenido del correo electronico"),
   *            ),
   *        ),
   *    ),
   *     @OA\Response(
   *         response=404,
   *         description="Error al enviar el correo electronico",
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
  public function index(Request $request)
  {
    try {
      $contenido = $request->input('contenido');
      $correo = $request->input('correo');
      $asunto = $request->input('asunto');

      $email = new DemoMail($asunto,$contenido);
      Mail::to($correo)->queue($email);

      $response = [
        'message' => 'Envio de correcto exitosamente',
      ];

      return response()->json($response, Response::HTTP_OK);
    } catch (\Throwable $th) {
      $response = [
        'message' => 'Error. Algo inesperado ha ocurrido',
      ];

      return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
  }
}
