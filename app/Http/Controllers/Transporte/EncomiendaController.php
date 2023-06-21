<?php

namespace App\Http\Controllers\Transporte;

use App\Http\Controllers\Controller;
use App\Models\Transporte\Solicitud;
use Illuminate\Http\Request;

class EncomiendaController extends Controller
{
  public function index()
  {
    $solicitudes = Solicitud::get();
    return view('transporte.solicitud.index', compact('solicitudes'));
  }

  public function indexProceso()
  {
    $solicitudes = Solicitud::where('estado', 0)->get();
    return view('transporte.solicitud.index', compact('solicitudes'));
  }

  public function indexEnCamino()
  {
    $solicitudes = Solicitud::where('estado', 1)->get();
    return view('transporte.solicitud.index', compact('solicitudes'));
  }

  public function indexEntregado()
  {
    $solicitudes = Solicitud::where('estado', 2)->get();
    return view('transporte.solicitud.index', compact('solicitudes'));
  }

  // 0: en proceso, 1: en camino, 2: entregado
  public function create() {
    return view('transporte.solicitud.create');
  }

  public function store(Request $request)
  {
    $solicitud = new Solicitud();
    $solicitud->codigo_seguimiento = substr(time(), 1, 5) . 'MUSICPRO' . rand(100000, 999999);
    // $solicitud->tipo = 'C';
    $solicitud->nombre_origen = $request->nombre_origen;
    $solicitud->direccion_origen = $request->direccion_origen;

    $solicitud->nombre_destino = $request->nombre_destino;
    $solicitud->direccion_destino = $request->direccion_destino;

    $solicitud->comentario = $request->comentario;
    $solicitud->save();
    return redirect()->route('transporte.encomienda.index')->with('success', 'Solicitud creada correctamente #' . $solicitud->codigo_seguimiento);
  }

  function show($id) {
    $solicitud = Solicitud::find($id);
    return view('transporte.solicitud.show', compact('solicitud'));
  }


  public function update(Request $request, $id)
  {
    $solicitud = Solicitud::find($id);

    $estado = $request->input('estado');
    $solicitud->estado = 0;

    if ($estado >= 1) {
      $solicitud->estado = $estado;
    }

    $solicitud->update();
    return back()->with('success', 'Solicitud actualizada correctamente #' . $solicitud->codigo_seguimiento);
  }
}
