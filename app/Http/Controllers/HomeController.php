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
class HomeController extends Controller
{
  public function index() {

    $productos = Producto::get()->count() ?? 0;
    if ($productos == 0) {
      (new ProductoPreload())->call();
    }

    return view('www.index');
  }

  public function tarjeta() {
    return view('www.tarjeta.index');
  }

  public function transporte() {
    return view('www.transporte.index');
  }

  public function sucursal() {
    $productos = Producto::inRandomOrder()->get();

    return view('www.sucursal.index', compact('productos'));
  }

  public function integracion() {
    $client = new Client([
      'base_uri' => 'http://192.168.175.206:5000',
      'headers' => [
          'Authorization' => 'Bearer ' . config('api.token'),
          'Accept' => 'application/json',
      ],
    ]);

    $response = $client->get('/api/productos.json');

    if ($response->getStatusCode() === 200) {
        $data = json_decode($response->getBody(), true);
        return $data;
    }

    return null;
  }

  public function sucursalPago() {
    $tarjetas = BancoAPI::get();
    return view('www.sucursal.pago', compact('tarjetas'));
  }

  public function sucursalPagoStore(Request $request) {
    $pago = $request->input('pago');
    $banco = BancoAPI::where('code', $pago)->firstOrFail();

    $lista_producto = json_decode($request->input('listaproductos'));
    $ids = array_column($lista_producto, 'id');
    $cantidad = array_column($lista_producto, 'cantidad');

    $productos = Producto::whereIn('id', $ids)->get();
    $monto = 0;
    $posicion = 0;
    foreach ($productos as $producto) {
      $subtotal = ($producto->precio * $cantidad[$posicion]);
      $monto += $subtotal;
      $posicion++;
    }

    $boleta = new Boleta();
    $boleta->id_usuario_solicitante = current_store_user()->id;
    $boleta->direccion = $request->input('direccion');
    $boleta->nombre = current_store_user()->nombre;
    $boleta->total_pagado = $monto;
    $boleta->forma_pago = $banco->code;
    $boleta->estado = 0;
    $boleta->save();


    $posicion = 0;
    foreach ($productos as $producto) {
      $detalle_boleta = new DetalleBoleta();
      $detalle_boleta->id_producto = $producto->id;
      $detalle_boleta->id_boleta = $boleta->id;
      $detalle_boleta->total = ($producto->precio * $cantidad[$posicion]);
      $detalle_boleta->precio = $producto->precio;
      $detalle_boleta->cantidad = $cantidad[$posicion];
      $detalle_boleta->save();
    }

    $callback = route('sucursal.pago.recibo', $boleta->id);

    if ($banco->code == 'BEATPAY') {
      $info = "user=" . $banco->usuario;
      $info = $info . "&secret_key=". $banco->secret_key;
      $info = $info . "&monto=" . $monto;
      $info = $info . "&callback=" . $callback;

      return redirect('http://192.168.137.145:3000/api/v1/tarjeta/transferir_get?' . $info);
    }


    return "error 500";
  }

  public function sucursalPagoRecibo(Request $request, $id) {
    $b = Boleta::findOrFail($id);

    if ($b->forma_pago == 'BEATPAY') {
      $status = $_GET['status'];

      if ($status == 'success') {
        $b->estado = 1; // pagado
      } else {
        $b->estado = 0; // no pagado
      }
      $b->update();
    }

    // return redirect()->route('sucursal.pago.recibo');

    return view('www.sucursal.recibido', compact('estado'));
  }

  function transporteSeguimiento($code) {
    try {
      $s = Solicitud::where('codigo_seguimiento', $code)->firstOrFail();
      return view('www.transporte.show', compact('s'));
    } catch (\Throwable $th) {
      return back()->with('danger','No se encontro el codigo de seguimiento');
    }
  }


  public function testPay() {
    // $cc = (new CodeConClave())->enviarSolicitud();

    // $cc = (new GranJVCorp())->pedidosAll();

    $daemon = (new DaemonPay())->post();

    // $fre = (new FreeCode())->tranferir();

    return $daemon;
  }

  function bodega ()  {

  }
}
