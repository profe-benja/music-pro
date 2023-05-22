<?php

namespace App\Http\Controllers\Tarjeta\App;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Banco;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
  // public function index() {
  //   $u = current_tarjeta_user();
  //   $bancos = Banco::where('disponible', true)->get();


  //   return view('tarjeta.app.index', compact('u', 'bancos'));
  // }


    public function transferir(Request $request) {
      $id_banco_origen = $request->id_banco_origen;
      $id_banco_destino = $request->id_banco_destino;

      $banco_origen = Banco::find($id_banco_origen);
      $banco_destino = Banco::find($id_banco_destino);

      $tarjeta_origen = Tarjeta::where('id_banco', $id_banco_origen)->first();
      $tarjeta_destino = Tarjeta::where('id_banco', $id_banco_destino)->first();

      $t = new Transaccion();

      $t->id_tarjeta_origen = current_tarjeta_user()->me_card()->saldo;
      $t->id_banco_origen = $request->id_banco_origen;
      $t->id_tarjeta_destino = $request->id_tarjeta_destino;
      $t->id_banco_destino = $request->id_banco_destino;
      $t->monto = $request->monto;
      $t->descripcion = $request->decripcion;
      $t->save();



    }
}
