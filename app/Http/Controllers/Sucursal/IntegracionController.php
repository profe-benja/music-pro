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

  public function bodegaStore(Request $request) {
    $b = new BodegaAPI();
    $b->nombre = $request->input('nombre');
    $b->token =  substr(trim($request->input('nombre')), 0, 3) . '-' . substr(md5(time()), 0, 5);
    $b->url = $request->input('url');
    $b->code = $request->input('code');
    $b->disponible = $request->input('disponible') == 1 ? true : false;
    $url_productos = $request->input('url_productos');
    $url_solicitud = $request->input('url_solicitud');

    $integracion = [
      'url_productos' => $url_productos,
      'url_solicitud' => $url_solicitud,
    ];

    $b->integrations = $integracion;
    $b->save();
    return redirect()->route('sucursal.integracion.bodega')->with('success', 'Se ha creado correctamente');
  }


  public function bodegaEditar($id) {
    $b = BodegaAPI::findOrFail($id);
    return view('sucursal.integracion.bodega.edit', compact('b'));
  }

  public function bodegaUpdate(Request $request, $id) {
    $b = BodegaAPI::findOrFail($id);
    $b->nombre = $request->input('nombre');
    $b->url = $request->input('url');
    $b->code = $request->input('code');
    $b->disponible = $request->input('disponible') == 1 ? true : false;

    $integracion = $b->integrations;
    $url_productos = $request->input('url_productos');
    $url_solicitud = $request->input('url_solicitud');

    $integracion = [
      'url_productos' => $url_productos,
      'url_solicitud' => $url_solicitud,
    ];

    $b->integrations = $integracion;
    $b->update();

    return back()->with('success', 'Se ha actualizado correctamente');
  }


  public function bodegaSolicitudes($id) {
    $b = BodegaAPI::with('solicitudes')->findOrFail($id);
    return view('sucursal.integracion.bodega.solicitud.index', compact('b'));
  }

  public function bodegaSolicitudesCreate($id) {
    $b = BodegaAPI::findOrFail($id);

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
