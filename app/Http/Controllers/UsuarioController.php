<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Models\Inf\Team;
use App\Models\Inf\Usuario;
use App\Services\Policies\UsuarioPolicy;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

  private $policy;

  public function __construct() {
    $this->policy = new UsuarioPolicy();
  }

  public function index() {
    $this->policy->admin(current_user());
    $usuarios = Usuario::with('team')->where('admin',false)->get();
    return view('usuario.index', compact('usuarios'));
  }

  public function admin() {
    $this->policy->admin(current_user());
    $usuarios = Usuario::with('team')->where('admin',true)->get();
    return view('usuario.index', compact('usuarios'));
  }

  public function create() {
    $this->policy->admin(current_user());
    $teams = Team::get();
    return view('usuario.create', compact('teams'));
  }

  public function store(StoreUsuarioRequest $request) {
    $this->policy->admin(current_user());

    $u = new Usuario();
    $u->run = $request->input('run');
    $u->correo = $request->input('correo');
    $u->nombre = $request->input('nombre');
    $u->apellido = $request->input('apellido');
    $u->username = $request->input('correo');
    $u->password = hash('sha256', $request->input('pass'));
    $u->admin = $request->input('admin') == 1 ? true : false;
    $u->id_team = $request->input('team');
    $u->tipo_usuario = $request->input('tipo');
    $u->save();

    return redirect()->route('admin.usuario.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $this->policy->admin(current_user());

    $u = Usuario::findOrFail($id);

    return view('usuario.show', compact('u'));
  }

  public function edit($id) {
    $this->policy->admin(current_user());

    $teams = Team::get();
    $u = Usuario::findOrFail($id);
    return view('usuario.edit', compact('u','teams'));
  }

  public function update(Request $request, $id) {
    $this->policy->admin(current_user());

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
      $u->id_team = $request->input('team');
      $u->tipo_usuario = $request->input('tipo');
      $u->update();
    }
    return back()->with('success','Se ha actualizado');
  }

  public function historial($id) {
    $this->policy->admin(current_user());

    $u = Usuario::with(['transacciones'])->findOrFail($id);

    return view('usuario.historial', compact('u'));
  }
}
