<?php

namespace App\Http\Controllers;

use App\Models\De\Producto;
use App\Models\De\Solicitud;
use App\Models\Inf\Usuario;
use App\Services\DispatchSolicitud;
use Illuminate\Http\Request;

class WebappController extends Controller
{
  public function index() {
    return view('webapp.index');
  }

  public function historial() {
    return view('webapp.historial');
  }

  public function canjear() {
    $productos = Producto::where('estado',3)->orderBy('id','desc')->get();

    return view('webapp.canjear', compact('productos'));
  }

  public function canjearShow($id) {
    try {
      $p = Producto::findOrFail($id);

      return view('webapp.detalle', compact('p'));
    } catch (\Throwable $th) {
      return redirect()->route('webapp.canjear');
    }
  }

  public function canjearStore(Request $request, $id) {
    $p = Producto::findOrFail($id);
    $u = Usuario::findOrFail(current_user()->id);

    $payload = (new DispatchSolicitud($u, $p))->call();

    return back()->with('payload',$payload);
  }

  public function sendCode(Request $request) {
    return $request;
  }
}
