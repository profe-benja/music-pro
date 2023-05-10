<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodegaController extends Controller
{

  public function home() {
    return view('bodega.home');
  }
}
