<?php

namespace App\Http\Controllers\Tarjeta\App;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Banco;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
use App\Services\Integrations\Tarjeta\DaemonPay;
use App\Services\Integrations\Tarjeta\FreeCode;
use App\Services\Integrations\Tarjeta\GenericoPay;
use App\Services\TransbankServices;
use Illuminate\Http\Request;

class AppController extends Controller
{
  public function index() {
    $u = current_tarjeta_user();
    $bancos = Banco::where('disponible', true)->get();
    $tarjeta = $u->me_card();
    $transacciones = Transaccion::where('id_tarjeta_origen', $tarjeta->id)
                                ->orWhere('id_tarjeta_destino', $tarjeta->id)
                                ->where('estado', Transaccion::STATUS_APROBADO)
                                ->orderBy('id', 'desc')->get();

    // return $transacciones;
    $agent = new Agent();
    $isMobile = $agent->isMobile();


    return view('tarjeta.app.index', compact('u','isMobile','tarjeta', 'bancos', 'transacciones'));
  }

  public function recargar(Request $request) {
    $monto = $request->input('monto');
    $u = current_tarjeta_user();
    $tarjeta = $u->me_card();

    $tr = new Transaccion();
    $tr->id_tarjeta_origen = 0;
    $tr->id_banco_origen = 0;
    $tr->code_banco_origen = 'WEBPAY';
    $tr->id_tarjeta_destino = $tarjeta->id;
    $tr->id_banco_destino = $tarjeta->id_banco;
    $tr->code_banco_destino = $tarjeta->banco->code;
    $tr->descripcion = 'recarga por webpay';
    $tr->monto = $monto;
    $tr->estado = Transaccion::STATUS_PENDIENTE;
    $tr->save();

    $route = route('tarjeta.app.recarga.callback');
    $rep_url = (new TransbankServices())->getUrl($tr->id, $monto, time(), $route);

    if ($rep_url == 'error') {
      return back()->with('error', 'Error al procesar la transacción');
    }
    return redirect($rep_url);
  }

  public function callbackRecarga() {
    $token = $_GET['token_ws'];

    $info = (new TransbankServices())->getCallback($token);
    $id_trans = $info['BuyOrder'];
    $monto = $info['Amount'];

    $trans = Transaccion::where('monto', $monto)->findOrFail($id_trans);
    $trans->info = $info;
    if ($info['status']) {
      $trans->estado = Transaccion::STATUS_APROBADO;
      $tarjeta = $trans->tarjetaDestino;
      $tarjeta->saldo += $monto;
      $tarjeta->update();
      $trans->update();
      return redirect()->route('tarjeta.app.index')->with('success', 'Transacción realizada');
    }

    $trans->estado = Transaccion::STATUS_RECHAZADO;
    $trans->update();
    return redirect()->route('tarjeta.app.index')->with('danger', 'Error en la transacción');
  }

  public function transferir(Request $request) {
    try {
      $id_banco = $request->input('id_banco');
      $banco =  Banco::findOrFail($id_banco);

      $nro_destino = $request->input('nro');
      $monto = abs($request->input('monto'));
      $descripcion = $request->input('descripcion');

      $u = current_tarjeta_user();
      $t = $u->me_card();

      $resto = $t->saldo - $monto;

      if ($resto < 0) {
        return back()->with('danger', 'Saldo insuficiente');
      }

      if($banco->code == 'DEMOMUSICPRO') {
        // envio de dinero a demomusicpro
        $d = Banco::where('code','DEMOMUSICPRO')->first();

        try {
          $response = (new GenericoPay($d->url, $t, $nro_destino, $monto, $descripcion))->tranferir();

          if ($response['status'] == "success") {

            $tr = new Transaccion();
            $tr->id_tarjeta_origen = $t->id;
            $tr->id_banco_origen = $t->id_banco;
            $tr->code_banco_origen = $t->banco->code;
            $tr->id_tarjeta_destino = null;
            $tr->nro_tarjeta_destino = $nro_destino;
            $tr->id_banco_destino = $d->id;
            $tr->code_banco_destino = strtoupper(str_replace(' ', '', $d->nombre));
            $tr->descripcion = 'transferencia a ' . $nro_destino . ' - ' . $descripcion;
            $tr->monto = $monto;
            $tr->estado = Transaccion::STATUS_APROBADO;
            $tr->save();

            $t->saldo = $resto;
            $t->update();

            return back()->with('success', 'Se ha transferido correctamente');
          }
          return back()->with('danger', 'No puedes transferir a tu misma tarjeta');
        } catch (\Throwable $th) {
          return back()->with('danger', 'No puedes transferir a tu misma tarjeta');
        }

      } elseif($banco->code == 'DEMOTESTCORRECTO') {
        // envio de dinero a demomusicpro
        $d = Banco::where('code','DEMOTESTCORRECTO')->first();

        $tr = new Transaccion();
        $tr->id_tarjeta_origen = $t->id;
        $tr->nro_tarjeta_origen = $t->nro;
        $tr->id_banco_origen = $t->id_banco;
        $tr->code_banco_origen = $t->banco->code;
        $tr->id_tarjeta_destino = null;
        $tr->nro_tarjeta_destino = $nro_destino;
        $tr->id_banco_destino = $d->id;
        $tr->code_banco_destino = strtoupper(str_replace(' ', '', $d->nombre));
        $tr->descripcion = 'transferencia a ' . $nro_destino . ' - ' . $descripcion;
        $tr->monto = $monto;
        $tr->estado = Transaccion::STATUS_APROBADO;
        $tr->save();

        $t->saldo = $resto;
        $t->update();

        return back()->with('success', 'Se ha transferido correctamente');
      } elseif($banco->code == 'DEMOTESTERROR') {
        return back()->with('danger', 'Error al transferir');
      } elseif ($banco->code == 'DAEMON') {
        $d = Banco::where('code','DAEMON')->first();

        try {
          $response = (new DaemonPay($d->url, $t, $nro_destino, $monto, $descripcion))->tranferir();
          if ($response['message'] == "Transferencia exitosa") {

            $tr = new Transaccion();
            $tr->id_tarjeta_origen = $t->id;
            $tr->nro_tarjeta_origen = $t->nro;
            $tr->id_banco_origen = $t->id_banco;
            $tr->code_banco_origen = $t->banco->code;
            $tr->id_tarjeta_destino = null;
            $tr->id_banco_destino = $d->id;
            $tr->nro_tarjeta_destino = $nro_destino;
            $tr->code_banco_destino = "DAEMON";
            $tr->descripcion = 'transferencia a ' . $nro_destino . ' - ' . $descripcion;
            $tr->monto = $monto;
            $tr->estado = Transaccion::STATUS_APROBADO;
            $tr->save();

            $t->saldo = $resto;
            $t->update();

            return back()->with('success', 'Se ha transferido correctamente');
          }
          return back()->with('danger', 'No puedes transferir a tu misma tarjeta');
        } catch (\Throwable $th) {
          return back()->with('danger', 'No puedes transferir a tu misma tarjeta');
        }
      } elseif ($banco->code == 'FREEPAY') {
        return (new FreeCode($t, $nro_destino, $monto, $descripcion))->tranferir();
      } elseif ($banco->code == 'BEATPAY') {
        if($nro_destino == $t->nro) {
          return back()->with('danger', 'No puedes transferir a tu misma tarjeta');
        }

        $tarjeta_destino = Tarjeta::where('nro', $request->input('nro'))->where('id_banco',1)->first();

        if (!$tarjeta_destino) { return back()->with('danger', 'Tarjeta no encontrada'); }

        $tr = new Transaccion();
        $tr->id_tarjeta_origen = $t->id;
        $tr->id_banco_origen = $t->id_banco;
        $tr->code_banco_origen = $t->banco->code;

        $tr->id_tarjeta_destino = $tarjeta_destino->id;
        $tr->id_banco_destino = $tarjeta_destino->id_banco;
        $tr->code_banco_destino = $tarjeta_destino->banco->code;
        $tr->descripcion = $descripcion;
        $tr->monto = $monto;
        $tr->estado = Transaccion::STATUS_APROBADO;
        $tr->save();

        $t->saldo = $resto;
        $t->update();

        $tarjeta_destino->saldo += $monto;
        $tarjeta_destino->update();

        return back()->with('success', 'Se ha realizado una transacción exitosa');
      } else {

        // Integracion con la otra entidad bancaria
        return back()->with('danger', 'Saldo insuficiente');
      }
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function empresa() {
    $u = current_tarjeta_user();
    $bancos = Banco::where('disponible', true)->get();
    $tarjeta = $u->me_card();

    // return $transacciones;
    $agent = new Agent();
    $isMobile = $agent->isMobile();

    return view('tarjeta.app.empresa', compact('u','isMobile','tarjeta', 'bancos'));
  }

  public function empresaUpdate(Request $request) {
    $u = current_tarjeta_user();

    $integrations = $u->integrations;
    $integrations['user'] = $request->input('user');
    $integrations['secret_key'] = $request->input('secret_key');
    $integrations['company'] = $request->input('company');
    $u->integrations = $integrations;
    $u->update();

    return back()->with('success', 'Se ha actualizado la información');
  }

  public function pefilUpdate(Request $request) {
    $pass = $request->input('password');
    $u = current_tarjeta_user();
    $u->password = hash('sha256', $pass);
    $u->update();
    return back()->with('success', 'Se ha actualizado la información');
  }
}
