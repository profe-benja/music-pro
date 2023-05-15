<?php

namespace App\Http\Controllers\Transporte;

use App\Http\Controllers\Controller;
use App\Models\Transporte\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  public function index() {
    $usuarios = Usuario::where('admin',false)->get();
    return view('transporte.usuario.index', compact('usuarios'));
  }

  public function admin() {
    $usuarios = Usuario::where('admin',true)->get();
    return view('transporte.usuario.index', compact('usuarios'));
  }

  public function create() {
    return view('transporte.usuario.create');
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

    return redirect()->route('transporte.usuario.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $u = Usuario::findOrFail($id);

    return view('transporte.usuario.show', compact('u'));
  }

  public function edit($id) {
    $u = Usuario::findOrFail($id);
    return view('transporte.usuario.edit', compact('u'));
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
