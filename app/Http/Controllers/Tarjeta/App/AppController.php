<?php

namespace App\Http\Controllers\Tarjeta\App;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Banco;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
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


    return view('tarjeta.app.index', compact('u', 'bancos'));
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
    } else {
      $trans->estado = Transaccion::STATUS_RECHAZADO;
    }

    $trans->update();
    return redirect()->route('tarjeta.app.index')->with('success', 'Transacción realizada');
  }
}
