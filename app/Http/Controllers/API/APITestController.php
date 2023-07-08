<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APITestController extends Controller
{

  function providerResponse(Request $request) {
    return [ 'status' => 'success' ,  $request];
  }

  function providerResponseGet(Request $request, $id) {
    return [ $request, $id ];
  }

  public function index()
  {
    // Aquí puedes realizar alguna lógica para obtener los datos que deseas enviar como respuesta

    // Supongamos que quieres enviar un arreglo de datos en formato JSON
    $data = [
      'nombre' => 'Juan',
      'apellido' => 'Pérez',
      'edad' => 30,
    ];

    // Para enviar la respuesta en formato JSON, puedes utilizar el método response() de Laravel
    // pasando como primer argumento el arreglo de datos y como segundo argumento el código de estado HTTP (200 en este caso)
    return response()->json($data, 200);
  }

  public function store(Request $request)
  {
    // Aquí puedes realizar alguna lógica para procesar los datos recibidos

    // Supongamos que deseas almacenar los datos recibidos en la base de datos
    $nombre = $request->input('nombre');
    $apellido = $request->input('apellido');
    $edad = $request->input('edad');

    // Código para guardar los datos en la base de datos...

    // Después de procesar los datos, puedes enviar una respuesta de éxito en formato JSON
    $response = [
      'message' => 'Datos guardados correctamente',
    ];

    // return response()->json($response, 201);
    return response()->json($response, Response::HTTP_CREATED);
  }

  /**
   * @OA\Get(
   *     path="/api/v1/test/saludo",
   *     summary="Obtener un respuesta del servidor",
   *     description="Obtener un respuesta del servidor",
   *     operationId="saludo",
   *     tags={"Test"},
   *     @OA\Response(
   *         response=200,
   *         description="Saludo obtenido correctamente",
   *         @OA\JsonContent(
   *            @OA\Property(property="message", type="string", example="Hola como estas"),
   *        )
   *    )
   * )
   */
  public function saludo()
  {
    $response = [
      'message' => 'Hola como estas',
    ];

    return response()->json($response, 200);
  }

  /**
   * @OA\Get(
   *     path="/api/v1/test/saldo",
   *     summary="obtiene el saldo de un usuario",
   *     description="Obtener el saldo de un usuario",
   *     operationId="saldo",
   *     tags={"Test"},
   *     @OA\Response(
   *         response=200,
   *         description="Saludo obtenido correctamente",
   *         @OA\JsonContent(
   *            @OA\Property(property="message", type="string", example="correcto"),
   *            @OA\Property(property="saldo", type="int", example="1000"),
   *            @OA\Property(property="saldo_raw", type="string", example="1.000"),
   *        )
   *    )
   * )
   */
  public function saldo()
  {
    $response = [
      'message' => 'correcto',
      'saldo' => 1000,
      'saldo_raw' => '1.000'
    ];

    return response()->json($response, 200);
  }

  /**
   * @OA\Get(
   *     path="/api/v1/test/parametro/{id}",
   *     summary="test para responder parametros",
   *     description="test para responder parametros",
   *     operationId="parametroGET",
   *     tags={"Test"},
   *     @OA\Parameter(
   *         name="id",
   *         in="path",
   *         description="ID del usuario",
   *         required=true,
   *         @OA\Schema(
   *             type="integer",
   *             format="int64",
   *             example=1
   *         )
   *      ),
   *     @OA\Response(
   *         response=200,
   *         description="Saludo obtenido correctamente",
   *         @OA\JsonContent(
   *            @OA\Property(property="id", type="int", example="1"),
   *        )
   *    )
   * )
   *
   * @OA\Post(
   *     path="/api/v1/test/parametro/{id}",
   *     summary="test para responder parametros",
   *     description="test para responder parametros",
   *     operationId="parametroPOST",
   *     tags={"Test"},
   *     @OA\Parameter(
   *         name="id",
   *         in="path",
   *         description="ID del usuario",
   *         required=true,
   *         @OA\Schema(
   *             type="integer",
   *             format="int64",
   *             example=1
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Saludo obtenido correctamente",
   *         @OA\JsonContent(
   *            @OA\Property(property="id", type="int", example="1"),
   *        )
   *    )
   * )
   * * @OA\Put(
   *     path="/api/v1/test/parametro/{id}",
   *     summary="test para responder parametros",
   *     description="test para responder parametros",
   *     operationId="parametroPut",
   *     tags={"Test"},
   *     @OA\Parameter(
   *         name="id",
   *         in="path",
   *         description="ID del usuario",
   *         required=true,
   *         @OA\Schema(
   *             type="integer",
   *             format="int64",
   *             example=1
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Saludo obtenido correctamente",
   *         @OA\JsonContent(
   *            @OA\Property(property="id", type="int", example="1"),
   *        )
   *    )
   * )
   * * @OA\Delete(
   *     path="/api/v1/test/parametro/{id}",
   *     summary="test para responder parametros",
   *     description="test para responder parametros",
   *     operationId="parametroDELETE",
   *     tags={"Test"},
   *     @OA\Parameter(
   *         name="id",
   *         in="path",
   *         description="ID del usuario",
   *         required=true,
   *         @OA\Schema(
   *             type="integer",
   *             format="int64",
   *             example=1
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Saludo obtenido correctamente",
   *         @OA\JsonContent(
   *            @OA\Property(property="id", type="int", example="1"),
   *        )
   *    )
   * )
   */
  public function parametro(Request $request, $id)
  {
    $response = ['request' => $request->all(), 'response' => $id];
    return response()->json($response, 200);
  }
}
