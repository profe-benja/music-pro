<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APIErrorResponseController extends Controller
{
  public function badRequest() {
    $response = [
      'error' => 'Bad Request',
      'message' => 'La solicitud no es válida.',
    ];

    return response()->json($response, Response::HTTP_BAD_REQUEST);
  }

  public function notFoundController() {
    $response = [
      'error' => 'Not Found',
      'message' => 'El recurso solicitado no se encontró.',
    ];

    return response()->json($response, Response::HTTP_NOT_FOUND);
  }

  public function unauthorized() {
    $response = [
      'error' => 'Unauthorized',
      'message' => 'Acceso no autorizado. Inicia sesión primero.',
    ];

    return response()->json($response, Response::HTTP_UNAUTHORIZED);
  }

  public function forbidden() {
    $response = [
      'error' => 'Forbidden',
      'message' => 'No tienes permisos para acceder a este recurso.',
    ];

    return response()->json($response, Response::HTTP_FORBIDDEN);
  }
}
