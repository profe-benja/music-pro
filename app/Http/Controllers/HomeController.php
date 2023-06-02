<?php

namespace App\Http\Controllers;

use App\Models\Sucursal\BancoApi;
use App\Models\Sucursal\Producto;
use App\Services\Preload\ProductoPreload;
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
    $tarjetas = BancoApi::get();
    return view('www.sucursal.pago', compact('tarjetas'));
  }

  public function sucursalPagoStore(Request $request) {

    $pago = $request->input('pago');

    $banco = BancoApi::where('code', $pago)->first();

    // return $banco;
    // $lista_producto = json_decode($request->input('listaproductos'));

    // foreach ($lista_producto as $producto) {
    //   // $producto = Producto::find($producto->id);
    //   // $producto->stock = $producto->stock - $producto->cantidad;
    //   // $producto->save();
    //   return $producto->cantidad;
    // }

    //  guardar solicitud

    // accion de pagar

    if ($banco->code == 'BEATPAY') {
      $info = "user=" . $banco->usuario;
      $info = $info . "&secret_key=". $banco->secret_key;
      $info = $info . "&monto=" . $request->input('monto');
      $info = $info . "&callback=" . $request->input('callback');

      return redirect('http://music-pro.test/api/v1/tarjeta/transferir_get?' . $info);
    }

    return $request->all();
    // return $request->all();
  }

  public function sucursalPagoRecibo() {
    return "recibido";
    // return view('www.sucursal.recibo');
  }
}
