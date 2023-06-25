<?php

namespace App\Http\Controllers;

use App\Models\Sucursal\BancoAPI;
use App\Models\Sucursal\Boleta;
use App\Models\Sucursal\DetalleBoleta;
use App\Models\Sucursal\Producto;
use App\Models\Transporte\Solicitud;
use App\Services\Integrations\Bodega\CodeConClave;
use App\Services\Integrations\Tarjeta\FreeCode;
use App\Services\Integrations\Transporte\GranJVCorp;
use App\Services\Preload\ProductoPreload;
use App\Services\Integrations\Tarjeta\DaemonPay;
use COM;
use Illuminate\Http\Request;


use GuzzleHttp\Client;
class TestController extends Controller

{
  function cccProductos() {
    $productos = (new CodeConClave())->buscarProductos();
    return $productos;
  }


  function cccSolicitud() {
    $rep = (new CodeConClave())->enviarSolicitud();

    return $rep;
  }
}
