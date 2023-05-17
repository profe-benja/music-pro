<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APITestController extends Controller
{
  /**
   * @OA\Get(
   *     path="/",
   *     description="Home page",
   *     @OA\Response(response="default", description="Welcome page")
   * )
   */
  public function index() {
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
}
