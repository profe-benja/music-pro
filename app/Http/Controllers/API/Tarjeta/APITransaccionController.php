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

      // user=benja@gmail.com&secret_key=123123&monto=1000&callback=https://www.google.com
      $get = 'user=' . $user . '&secret_key=' . $secret_key . '&monto' . $monto . '&callback=' . $callback;

      $route_post = $get;
      $usuarioTarjeta = Usuario::whereJsonContains('integrations->user', $user)->first();
      $compania = $usuarioTarjeta->getIntegrationCompany();

      if ($usuarioTarjeta->getSecretKey() == $secret_key) {
        $agent = new Agent();
        $isMobile = $agent->isMobile();

        return view('tarjeta.api.transferir', compact('isMobile','route_post','monto','usuarioTarjeta', 'compania'));
      }

      $callback = $callback . '?error=1';
      return Redirect($callback);
    } catch (\Throwable $th) {
      throw $th;
      $callback = $callback . '?error=1';
      return Redirect($callback);
    }
  }

  // INTERNO PAGO
  public function transaccion(Request $request) {
    $user = $_GET['user'] ?? ''; // correo
    $secret_key = $_GET['secret_key'] ?? ''; // clave interna
    $monto = $_GET['monto'] ?? '';
    $callback = $_GET['callback'] ?? '';

    // user=benja@gmail.com&secret_key=123123&monto=1000&callback=www.google.com
    $get = 'user=' . $user . '&secret_key=' . $secret_key . '&monto' . $monto . '&callback=' . $callback;

    $usuario = $request->input('user');
    $clave = $request->input('clave');



    // return Redirect($callback);

    $usuario = Usuario::whereJsonContains('integrations->user', $user)->first();
    return $usuario;
    // $usuario = Usuario::where('correo', $user)->first();
    if ($usuario->getSecretKey() == $secret_key) {

    }

    return $get;
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
