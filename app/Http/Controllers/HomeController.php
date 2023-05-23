<?php

namespace App\Http\Controllers;


use App\Models\Sucursal\Producto;
use App\Services\Preload\ProductoPreload;
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
}
