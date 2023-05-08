<?php

namespace App\Http\Controllers;

use App\Models\Inf\Team;
use App\Models\Inf\Usuario;
use App\Services\Policies\UsuarioPolicy;
use Illuminate\Http\Request;

class TeamController extends Controller
{

  private $policy;

  public function __construct() {
    $this->policy = new UsuarioPolicy();
  }

  public function index() {
    $this->policy->admin(current_user());
    $teams = Team::with(['lider'])->get();
    return view('team.index', compact('teams'));
  }

  public function create() {
    $this->policy->admin(current_user());
    $usuarios = Usuario::get();

    return view('team.create', compact('usuarios'));
  }

  public function store(Request $request) {
    $t = new Team();
    $t->nombre = $request->input('nombre');
    $t->descripcion = $request->input('descripcion');
    $t->id_lider = $request->input('lider');
    $t->save();

    return redirect()->route('admin.team.index')->with('success','Se ha creado correctamente');
  }
}
