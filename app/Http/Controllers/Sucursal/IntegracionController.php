<?php

namespace App\Http\Controllers\Sucursal;

use App\Http\Controllers\Controller;
use App\Models\Sucursal\BancoAPI;
use App\Models\Sucursal\BodegaAPI;
use App\Models\Sucursal\Producto;
use App\Services\ImportImage;
use App\Services\Integrations\Sucursal\CyberEdge;
use App\Services\Integrations\Sucursal\Musicpro;
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
    $bancos = BancoAPI::get();
    return view('sucursal.integracion.tarjeta.index', compact('bancos'));
  }

  public function bodega() {
    $bodegas = BodegaAPI::get();
    return view('sucursal.integracion.bodega.index', compact('bodegas'));
  }

  public function bodegaCreate() {
    return view('sucursal.integracion.bodega.create');
  }




  function bodegaMusicpro() {
    $response =  (new Musicpro())->productos();

    // $response = (new CyberEdge())->productos();
    // $rep = json_decode($response);

    // $productos = [];
    // foreach ($rep as $key => $value) {
    //   $pro = $rep[$key];

      // $p = [
      //   'id' => $pro['_id'],
      //   'nombre' => $pro['nombre'],
      //   'precio' => $pro['precio'],
      //   'img' =>  $rep[$key]['imagen'],
      // ];

      // return $p;

      // array_push($productos, $pro);
    // }

    // return $productos;

    // $productos = $response['productos'];

    //     id: 20,
    // codigo: "20009025",
    // nombre: "Congas Profesionales",
    // descripcion: "Instrumentos de percusión de origen afro-cubano",
    // precio: "339.324",
    // precio_raw: 339324,
    // asset: "http://music-pro.test/assets/productos/20.png",
    // asset_raw: "http://music-pro.test/assets/productos/20.png",
    // estado: 3

    // return $productos;

    return view('sucursal.integracion.bodega.productos', compact('productos'));
  }

}
