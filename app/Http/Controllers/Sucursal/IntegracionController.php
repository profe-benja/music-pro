<?php

namespace App\Http\Controllers\Sucursal;

use App\Http\Controllers\Controller;
use App\Models\Sucursal\Producto;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class IntegracionController extends Controller
{
  public function index() {
    return view('sucursal.integracion.index');
  }

  public function transporte() {
    return view('sucursal.integracion.transporte.index');
  }

  public function tarjeta() {

    return view('sucursal.integracion.tarjeta.index');
  }

  public function bodega() {
    return view('sucursal.integracion.bodega.index');
  }

}
