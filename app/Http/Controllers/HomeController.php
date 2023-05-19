<?php

namespace App\Http\Controllers;


use App\Models\Sucursal\Producto;
use App\Services\Preload\ProductoPreload;
use Illuminate\Http\Request;

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
}
