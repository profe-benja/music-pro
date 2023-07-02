<?php

namespace App\Http\Controllers\API\Tarjeta;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Banco;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class APITransaccionController extends Controller
{
  /**
   * @OA\Get(
   *     path="/api/v1/tarjeta/transferir_get",
   *     operationId="transferirGet",
   *     summary="Transferir fondos",
   *     tags={"Tarjeta BEATPAY"},
   *     description="Transferir fondos desde una tienda",
   *     @OA\Parameter(
   *         name="user",
   *         in="query",
   *         required=true,
   *         description="El nombre de usuario",
   *         @OA\Schema(
   *             type="string"
   *         )
   *     ),
   *     @OA\Parameter(
   *         name="secret_key",
   *         in="query",
   *         required=true,
   *         description="La clave secreta",
   *         @OA\Schema(
   *             type="string"
   *         )
   *     ),
   *     @OA\Parameter(
   *         name="monto",
   *         in="query",
   *         required=true,
   *         description="El monto a transferir",
   *         @OA\Schema(
   *             type="integer",
   *             format="int32"
   *         )
   *     ),
   *     @OA\Parameter(
   *         name="callback",
   *         in="query",
   *         required=true,
   *         description="La URL de callback",
   *         @OA\Schema(
   *             type="string",
   *             format="uri"
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Operación exitosa"
   *     ),
   *     @OA\Response(
   *         response=400,
   *         description="Parámetros inválidos"
   *     )
   * )
   */
  public function transferir_get(Request $request)
  {
    try {
      $user = $_GET['user'] ?? ''; // correo
      $secret_key = $_GET['secret_key'] ?? ''; // clave interna
      $monto = $_GET['monto'] ?? '';
      $callback = $_GET['callback'] ?? '';
      $status = $_GET['status'] ?? '';

      // user=benja@gmail.com&secret_key=123123&monto=1000&callback=https://www.google.com
      $params_get = 'user=' . $user . '&secret_key=' . $secret_key . '&monto=' . $monto . '&callback=' . $callback;

      $usuarioTarjeta = Usuario::whereJsonContains('integrations->user', $user)->first();
      $compania = $usuarioTarjeta->getIntegrationCompany();

      if ($usuarioTarjeta->getSecretKey() == $secret_key) {
        $agent = new Agent();
        $isMobile = $agent->isMobile();

        return view('tarjeta.api.transferir', compact('callback', 'isMobile', 'params_get', 'monto', 'usuarioTarjeta', 'compania', 'status'));
      }
      $callback = $callback . '?status=error';
      return Redirect($callback);
    } catch (\Throwable $th) {
      $callback = $callback . '?status=error';
      return Redirect($callback);
    }
  }

  // INTERNO PAGO
  public function transaccion(Request $request)
  {
    $params_get = $request->input('params_get');
    $correo = $request->input('correo');
    $pass =  hash('sha256', $request->input('pass'));

    $status = 'error';
    try {
      $usuario = Usuario::where('correo', $correo)->firstOrFail();
      if ($usuario->password == $pass) {
        $idUsuario = $request->input('usuarioTarjeta');
        $callback = $request->input('callback');
        $usuarioTarjeta = Usuario::findOrFail($idUsuario);

        $monto = $request->input('monto');

        $tarjeta_destino = $usuarioTarjeta->me_card();
        $tarjeta_origen = $usuario->me_card();

        if ($tarjeta_origen->saldo < $monto) {
          $status = 'money';
          $params_get = $params_get . '&status=' . $status;
          return redirect()->route('api.v1.tarjeta.transferir_get', $params_get);
        }

        $transaccion = new Transaccion();
        $transaccion->monto = $monto;
        $transaccion->id_tarjeta_origen = $tarjeta_origen->id;
        $transaccion->id_banco_origen = 1;
        $transaccion->code_banco_origen = "BEATPAY";
        $transaccion->id_tarjeta_destino = $tarjeta_destino->id;
        $transaccion->id_banco_destino = 1;
        $transaccion->code_banco_destino = "BEATPAY";
        $transaccion->descripcion = 'Transferencia de dinero ONLINE';
        $transaccion->save();

        $tarjeta_origen->saldo -= $monto;
        $tarjeta_origen->update();

        $tarjeta_destino->saldo += $monto;
        $tarjeta_destino->update();

        $status = 'success';
        return redirect($callback . '?status=' . $status);
      }
      $params_get = $params_get . '&status=' . $status;
      return redirect()->route('api.v1.tarjeta.transferir_get', $params_get);
    } catch (\Throwable $th) {
      return $th;
      $status = 'fail';
      $params_get = $params_get . '&status=' . $status;
      return redirect()->route('api.v1.tarjeta.transferir_get', $params_get);
    }
  }

  /**
   * @OA\Post(
   *     path="/api/v1/tarjeta/transferir",
   *     operationId="transferirPost",
   *     summary="Transferir fondos",
   *     tags={"Tarjeta BEATPAY"},
   *     @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *             @OA\Property(
   *                 property="tarjeta_origen",
   *                 type="string"
   *             ),
   *             @OA\Property(
   *                 property="tarjeta_destino",
   *                 type="string"
   *             ),
   *             @OA\Property(
   *                 property="comentario",
   *                 type="string"
   *             ),
   *             @OA\Property(
   *                 property="monto",
   *                 type="integer",
   *                 format="int32"
   *             ),
   *             @OA\Property(
   *                 property="codigo",
   *                 type="string"
   *             ),
   *             @OA\Property(
   *                 property="token",
   *                 type="string"
   *             )
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Operación exitosa",
   *         @OA\JsonContent(
   *             @OA\Property(
   *                 property="status",
   *                 type="integer",
   *                 example=200
   *             ),
   *             @OA\Property(
   *                 property="result",
   *                 @OA\Property(
   *                     property="message",
   *                     type="string",
   *                     example="Se ha realizado el depósito"
   *                 )
   *             )
   *         )
   *     ),
   *     @OA\Response(
   *         response=400,
   *         description="Parámetros inválidos"
   *     )
   * )
   */
  public function transferir(Request $request)
  {
    $nro_origen =  $request->input('tarjeta_origen');
    $nro_destino = $request->input('tarjeta_destino');
    $comentario = $request->input('comentario') ?? '';

    $monto = $request->input('monto');
    $codigo = $request->input('codigo');
    $token = $request->input('token');
    $banco_origen = Banco::where('code', $codigo)->where('token', $token)->first();
    $tarjeta_destino = Tarjeta::where('nro', $nro_destino)->first();

    if ($monto <= 0) {
      $response = array(
        'status'  => 404,
        'message' => 'El monto debe ser mayor a 0'
      );
    } else {

      if ($banco_origen == null) {
        $response = array(
          'status'  => 404,
          'message' => 'Banco no encontrado'
        );
      } else {

        if ($tarjeta_destino == null) {
          $response = array(
            'status'  => 404,
            'message' => 'Tarjeta destino no encontrada'
          );
        } else {


          $tr = new Transaccion();
          $tr->id_tarjeta_origen = null;
          $tr->nro_tarjeta_origen = $nro_origen;
          $tr->id_banco_origen = $banco_origen->id;
          $tr->code_banco_origen = $banco_origen->code;

          $tr->id_tarjeta_destino = $tarjeta_destino->id;
          $tr->nro_tarjeta_destino = $tarjeta_destino->nro;
          $tr->id_banco_destino = $tarjeta_destino->id;
          $tr->code_banco_destino = 'BEATPAY';

          $tr->descripcion = 'transferencia a ' . $nro_destino . ' - ' . $comentario;
          $tr->monto = $monto;
          $tr->estado = Transaccion::STATUS_APROBADO;
          $tr->save();

          $tarjeta_destino->saldo += $monto;
          $tarjeta_destino->update();

          $response = array(
            'status'  => 200,
            'message' => 'Se ha realizado la transferencia'
          );
        }
      }
    }

    return response()->json(compact('response'));
  }

  /**
   * @OA\Get(
   *     path="/api/v1/tarjeta/{nro_tarjeta}/transacciones",
   *     summary="Obtener información de la tarjeta y sus transacciones",
   *     description="Obtiene detalles de la tarjeta y las transacciones realizadas",
   *     operationId="tarjetaTransaccionesGet",
   *     tags={"Tarjeta BEATPAY"},
   *     @OA\Parameter(
   *         name="nro_tarjeta",
   *         in="path",
   *         description="Número de tarjeta",
   *         required=true,
   *         @OA\Schema(
   *             type="string",
   *             example="1000012345678"
   *         )
   *     ),
   *     @OA\Parameter(
   *         name="pass",
   *         in="query",
   *         required=true,
   *         description="password al iniciar sesión tarjeta cliente",
   *         @OA\Schema(
   *             type="string",
   *             example="123456"
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Operación exitosa",
   *         @OA\JsonContent(
   *             @OA\Property(
   *                 property="nro",
   *                 type="integer",
   *                 example="1000012345678"
   *             ),
   *            @OA\Property(
   *                 property="salado",
   *                 type="integer",
   *                 example=100000000
   *             ),
   *             @OA\Property(
   *                 property="transacciones",
   *                 @OA\Property(
   *                     property="message",
   *                     type="json",
   *                     example="informacion de la transferencia"
   *                 )
   *             )
   *         )
   *     ),
   *     @OA\Response(
   *         response=400,
   *         description="Parámetros inválidos"
   *     )
   * )
   */
  public function transacciones(Request $request, $nro)
  {

    if (!empty($_GET['pass'])) {
      $pass = $_GET['pass'];
      $password =  hash('sha256', $pass);

      $tarjeta = Tarjeta::where('nro', $nro)->firstOrFail();
      $u = $tarjeta->usuario;

      if ($password == $u->password) {
        $transacciones = Transaccion::where('id_tarjeta_origen', $tarjeta->id)
          ->orWhere('id_tarjeta_destino', $tarjeta->id)
          ->where('estado', Transaccion::STATUS_APROBADO)
          ->orderBy('id', 'desc')->get();

        $raw = $tarjeta->get_rawinfo();
        $raw['transacciones'] = $transacciones;

        $response = array(
          'status'  => 200,
          'message' => 'Tarjeta encontrada',
          'result' => $raw
        );
      } else {
        $response = array(
          'status'  => 404,
          'message' => 'Tarjeta no encontrada'
        );
      }
    } else {
      $response = array(
        'status'  => 404,
        'message' => 'pass no encontrada'
      );
    }



    return response()->json(compact('response'), $response['status']);
  }


  /**
   * @OA\Get(
   *     path="/api/v1/tarjeta/{nro_tarjeta}",
   *     summary="Obtener saldo información de la tarjeta",
   *     description="Obtiene detalles de la tarjeta",
   *     operationId="tarjetaShow",
   *     tags={"Tarjeta BEATPAY"},
   *     @OA\Parameter(
   *         name="nro_tarjeta",
   *         in="path",
   *         description="Número de tarjeta",
   *         required=true,
   *         @OA\Schema(
   *             type="string",
   *             example="1000012345678"
   *         )
   *     ),
   *     @OA\Parameter(
   *         name="pass",
   *         in="query",
   *         required=true,
   *         description="password al iniciar sesión tarjeta cliente",
   *         @OA\Schema(
   *             type="string",
   *             example="123456"
   *         )
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="Operación exitosa",
   *         @OA\JsonContent(
   *             @OA\Property(
   *                 property="nro",
   *                 type="integer",
   *                 example="1000012345678"
   *             ),
   *            @OA\Property(
   *                 property="salado",
   *                 type="integer",
   *                 example=100000000
   *             ),
   *         )
   *     ),
   *     @OA\Response(
   *         response=400,
   *         description="Parámetros inválidos"
   *     )
   * )
   */
  public function show(Request $request, $nro)
  {

    if (!empty($_GET['pass'])) {
      $pass = $_GET['pass'];
      $password =  hash('sha256', $pass);

      $tarjeta = Tarjeta::where('nro', $nro)->firstOrFail();
      $u = $tarjeta->usuario;

      if ($password == $u->password) {
        $raw = $tarjeta->get_rawinfo();

        $response = array(
          'status'  => 200,
          'message' => 'Tarjeta encontrada',
          'result' => $raw
        );
      } else {
        $response = array(
          'status'  => 404,
          'message' => 'Tarjeta no encontrada'
        );
      }
    } else {
      $response = array(
        'status'  => 404,
        'message' => 'pass no encontrada'
      );
    }
    return response()->json(compact('response'), $response['status']);
  }
}
