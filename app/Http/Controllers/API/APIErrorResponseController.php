<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APIErrorResponseController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/v1/test/error/bad_request",
   *     summary="Obtiene la respuesta de error Bad Request 400",
   *     description="Obtiene la respuesta de error Bad Request 400",
   *     operationId="bad_request",
   *     tags={"TestError"},
   *     @OA\Response(
   *         response=400,
   *         description="Respuesta de la endpoint bad_request",
   *         @OA\JsonContent(
   *            @OA\Property(property="error", type="string", example="bad request"),
   *            @OA\Property(property="message", type="string", example="La solicitud no es válida."),
   *        )
   *    )
   * )
   */
  public function badRequest()
  {
    $response = [
      'error' => 'Bad Request',
      'message' => 'La solicitud no es válida.',
    ];

    return response()->json($response, Response::HTTP_BAD_REQUEST);
  }

  /**
   * @OA\Get(
   *     path="/api/v1/test/error/not_found",
   *     summary="Obtiene la respuesta de error not found 404",
   *     description="Obtiene la respuesta de error not found 404",
   *     operationId="not_found",
   *     tags={"TestError"},
   *     @OA\Response(
   *         response=404,
   *         description="Respuesta de la endpoint not_found",
   *         @OA\JsonContent(
   *            @OA\Property(property="error", type="string", example="Not Found"),
   *            @OA\Property(property="message", type="string", example="El recurso solicitado no se encontró."),
   *        )
   *    )
   * )
   */
  public function notFound()
  {
    $response = [
      'error' => 'Not Found',
      'message' => 'El recurso solicitado no se encontró.',
    ];

    return response()->json($response, Response::HTTP_NOT_FOUND);
  }

  /**
   * @OA\Get(
   *     path="/api/v1/test/error/unauthorized",
   *     summary="Obtiene la respuesta de error no autorizado unauthorized 401",
   *     description="Obtiene la respuesta de error no autorizado unauthorized 401",
   *     operationId="unauthorized",
   *     tags={"TestError"},
   *     @OA\Response(
   *         response=401,
   *         description="Respuesta de la endpoint unauthorized",
   *         @OA\JsonContent(
   *            @OA\Property(property="error", type="string", example="Unauthorized"),
   *            @OA\Property(property="message", type="string", example="Acceso no autorizado. Inicia sesión primero."),
   *        )
   *    )
   * )
   */
  public function unauthorized()
  {
    $response = [
      'error' => 'Unauthorized',
      'message' => 'Acceso no autorizado. Inicia sesión primero.',
    ];

    return response()->json($response, Response::HTTP_UNAUTHORIZED);
  }



  /**
   * @OA\Get(
   *     path="/api/v1/test/error/forbidden",
   *     summary="Obtiene la respuesta de error no tienes permiso 403",
   *     description="Obtiene la respuesta de error no tienes permiso 403",
   *     operationId="forbidden",
   *     tags={"TestError"},
   *     @OA\Response(
   *         response=401,
   *         description="Respuesta de la endpoint forbidden",
   *         @OA\JsonContent(
   *            @OA\Property(property="error", type="string", example="forbidden"),
   *            @OA\Property(property="message", type="string", example="No tienes permisos para acceder a este recursos."),
   *        )
   *    )
   * )
   */
  public function forbidden()
  {
    $response = [
      'error' => 'Forbidden',
      'message' => 'No tienes permisos para acceder a este recurso.',
    ];

    return response()->json($response, Response::HTTP_FORBIDDEN);
  }
}
