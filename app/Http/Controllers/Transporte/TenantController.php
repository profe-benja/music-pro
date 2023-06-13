<?php

namespace App\Http\Controllers\Transporte;

use App\Http\Controllers\Controller;
use App\Models\Transporte\Tenant;
use App\Models\Transporte\Usuario;
use Illuminate\Http\Request;

class TenantController extends Controller
{
  public function index() {
    $tenants = Tenant::get();
    return view('transporte.tenant.index', compact('tenants'));
  }

  public function create() {
    return view('transporte.tenant.create');
  }

  public function store(Request $request) {
    $t = new Tenant();
    $t->email = $request->input('email');
    $t->token = $request->input('token');
    $t->nombre = $request->input('nombre');
    $t->telefono = $request->input('telefono');
    $t->direccion = $request->input('direccion');
    $t->tipo = $request->input('tipo') == 1 ? 'SUCURSAL' : 'BODEGA';
    $t->save();
    return redirect()->route('transporte.tenant.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $t = Tenant::findOrFail($id);

    return view('transporte.tenant.show', compact('t'));
  }

  public function edit($id) {
    $t = Tenant::findOrFail($id);
    return view('transporte.tenant.edit', compact('t'));
  }

  public function update(Request $request, $id) {
    $t = Tenant::findOrFail($id);


    // if ($request->pass) {
    //   $u->password = hash('sha256', $request->input('pass'));
    //   $u->update();
    // }

    // if ($request->nombre) {
    //   $u->correo = $request->input('correo');
    //   $u->run = $request->input('run');
    //   $u->nombre = $request->input('nombre');
    //   $u->apellido = $request->input('apellido');
    //   $u->username = $request->input('correo');
    //   $u->admin = $request->input('admin') == 1 ? true : false;
    //   // $u->id_team = $request->input('team');
    //   $u->tipo_usuario = $request->input('tipo');
    //   $u->update();
    // }
    return back()->with('success','Se ha actualizado');
  }
}
