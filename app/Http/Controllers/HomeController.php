<?php

namespace App\Http\Controllers;


use App\Models\Sistema\Sistema;
use App\Models\Sucursal\Producto;
use App\Services\FormularioSocioeconomico;
use App\Services\Jwt\JwtFirmaDecode;
use App\Services\Jwt\JwtFirmaEncode;
use App\Services\Preload\ProductoPreload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index() {

    $productos = Producto::get()->count() ?? 0;
    if ($productos == 0) {
      (new ProductoPreload())->call();
    }

    $s = Sistema::first();

    if ($s->getInfoDemo()) {
      // if ($s->getInfoRedirectUrl()) {
      //   // return redirect($s->getInfoRedirectUrl());

      //   header('Location: '.$s->getInfoRedirectUrl());
      // }

      return view('www.index');
    }

    return redirect()->route('login');
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
