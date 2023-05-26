<?php

namespace App\Http\Controllers\Tarjeta\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  public function index() {
    $usuarios = Usuario::where('admin',false)->get();
    return view('tarjeta.admin.usuario.index', compact('usuarios'));
  }

  public function admin() {
    $usuarios = Usuario::where('admin',true)->get();
    return view('tarjeta.admin.usuario.index', compact('usuarios'));
  }

  public function create() {
    return view('tarjeta.admin.usuario.create');
  }

  public function store(Request $request) {
    $u = new Usuario();
    $u->run = $request->input('run');
    $u->correo = $request->input('correo');
    $u->nombre = $request->input('nombre');
    $u->apellido = $request->input('apellido');
    $u->username = $request->input('correo');
    $u->password = hash('sha256', $request->input('pass'));
    $u->admin = $request->input('admin') == 1 ? true : false;
    // $u->id_team = $request->input('team');
    $u->tipo_usuario = $request->input('tipo');
    $u->save();

    $t = new Tarjeta();
    $t->id_usuario = $u->id;
    $t->nro = ($u->id * 100) . substr($u->run, 0, strlen($u->run) - 1);
    $t->pin = '';
    $t->id_banco = 1;
    $t->saldo = 10000;
    $t->save();

    $tr = new Transaccion();
    $tr->id_tarjeta_origen = 1;
    $tr->id_banco_origen = 1;
    $tr->code_banco_origen = 'BETPAY';

    $tr->id_tarjeta_destino = $t->id;
    $tr->id_banco_destino = 1;
    $tr->code_banco_destino = 'BEATPAY';
    $tr->descripcion = 'Carga inicial';
    $tr->estado = 1;
    $tr->monto = 10000;
    $tr->save();

    $tarjeta_banco = Tarjeta::find(1);
    $tarjeta_banco->saldo = $tarjeta_banco->saldo - $tr->monto;
    $tarjeta_banco->update();


    return redirect()->route('tarjeta.admin.usuario.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $u = Usuario::findOrFail($id);

    return view('tarjeta.admin.usuario.show', compact('u'));
  }

  public function edit($id) {
    $u = Usuario::findOrFail($id);
    return view('tarjeta.admin.usuario.edit', compact('u'));
  }

  public function update(Request $request, $id) {
    $u = Usuario::findOrFail($id);

    if ($request->pass) {
      $u->password = hash('sha256', $request->input('pass'));
      $u->update();
    }

    if ($request->nombre) {
      $u->correo = $request->input('correo');
      $u->run = $request->input('run');
      $u->nombre = $request->input('nombre');
      $u->apellido = $request->input('apellido');
      $u->username = $request->input('correo');
      $u->admin = $request->input('admin') == 1 ? true : false;
      // $u->id_team = $request->input('team');
      $u->tipo_usuario = $request->input('tipo');
      $u->update();
    }
    return back()->with('success','Se ha actualizado');
  }
}
