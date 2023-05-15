<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransporteController extends Controller
{
  public function home() {
    return view('transporte.home');
  }
}
