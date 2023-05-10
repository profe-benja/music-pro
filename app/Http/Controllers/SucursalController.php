<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SucursalController extends Controller
{

  public function home() {
    return view('sucursal.home');
  }
}
