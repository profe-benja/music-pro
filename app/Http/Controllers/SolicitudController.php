<?php

namespace App\Http\Controllers;

use App\Models\De\Solicitud;
use App\Services\FinishedSolicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{

  private $policy;

  // public function __construct() {
  //   $this->policy = new UsuarioPolicy();
  // }

  public function index() {
    $solicitudes = Solicitud::where('estado',1)
                            ->with(['producto', 'usuario_solicitante'])
                            ->get();
    return view('solicitud.index', compact('solicitudes'));
  }

  public function aceptados() {
    $solicitudes = Solicitud::where('estado',2)
                            ->with(['producto', 'usuario_solicitante'])
                            ->get();
    return view('solicitud.index', compact('solicitudes'));
  }

  public function rechazados() {
    $solicitudes = Solicitud::where('estado',3)
                            ->with(['producto', 'usuario_solicitante'])
                            ->get();
    return view('solicitud.index', compact('solicitudes'));
  }

  public function show($id) {
    $s = Solicitud::with(['producto', 'usuario_solicitante', 'transaccion'])->findOrFail($id);
    $p = $s->producto;

    return view('solicitud.show', compact('s','p'));
  }

  public function finished(Request $request, $id) {
    $estado = $request->input('estado');

    $payload = (new FinishedSolicitud($id, $estado))->call();

    return back()->with('payload',$payload);
  }
}
