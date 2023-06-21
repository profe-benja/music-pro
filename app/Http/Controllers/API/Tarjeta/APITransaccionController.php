<?php

namespace App\Http\Controllers\API\Tarjeta;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Agent;


class APITransaccionController extends Controller
{
  public function transferir_get(Request $request) {
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

        return view('tarjeta.api.transferir', compact('callback','isMobile','params_get','monto','usuarioTarjeta', 'compania','status'));
      }
      $callback = $callback . '?status=error';
      return Redirect($callback);
    } catch (\Throwable $th) {
      $callback = $callback . '?status=error';
      return Redirect($callback);
    }
  }

  // INTERNO PAGO
  public function transaccion(Request $request) {
    $params_get = $request->input('params_get');
    $correo = $request->input('correo');
    $pass =  hash('sha256', $request->input('pass'));

    $status = 'error';
    try {
      $usuario = Usuario::where('correo', $correo)->firstOrFail();
      if ($usuario->password == $pass ) {
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
}

//   public function transferir(Request $request) {
//     $response = array(
//       'status'  => 404,
//       'result' => array(
//         'message'    => 'No se pudo realizar la transferencia',
//       )
//     );

//     $nro_origen = $request->input('nro_origen');
//     $nro_destino = $request->input('nro_destino');
//     $monto = $request->input('monto');

//     $origen = Tarjeta::where('nro', $nro_origen)->first();
//     $destino = Tarjeta::where('nro', $nro_destino)->first();

//     if ($nro_origen == $nro_destino) {
//       if ($origen && $destino) {
//         if ($origen->saldo >= $monto) {
//           $origen->saldo -= $monto;
//           $destino->saldo += $monto;
//           $origen->update();
//           $destino->update();

//           // $u = Usuario::first();
//           // $tarjeta = $u->me_card();

//           $t = new Transaccion();
//           $t->id_tarjeta_origen = null;
//           $t->id_banco_origen = 1;
//           $t->code_banco_origen = 'QUEMADEDINERO';

//           $t->id_tarjeta_destino = $tarjeta->id;
//           $t->id_banco_destino = 1;
//           $t->code_banco_destino = 'BEATPAY';
//           $t->descripcion = 'Transferencia de dinero';
//           $t->monto = $monto;
//           $t->estado = 1;
//           $t->save();

//           $response['status'] = 200;
//           $response['result']['message'] = 'Transferencia realizada correctamente';
//         } else {
//           $response['result']['message'] = 'Saldo insuficiente';
//         }
//       } else {
//         $response['result']['message'] = 'Tarjeta no encontrada';
//       }
//     } else {
//       $response['result']['message'] = 'No puedes transferir a tu misma tarjeta';
//     }

//     return response()->json($response, 200);
//   }

//   public function saldo(Request $request, $nro) {
//     $response = array(
//       'status'  => 404,
//       'result' => array(
//         'saldo'    => null,
//       )
//     );

//     $p = Tarjeta::where('nro', $nro)->first();

//     if ($p) {
//       $response['status'] = 200;
//       $response['result']['saldo'] = $p->saldo;
//     }

//     return response()->json($response, 200);
//   }
// }
