<?php

namespace App\Http\Controllers\Tarjeta\App;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Usuario;
use Illuminate\Http\Request;

class AppController extends Controller
{
  public function index() {
    $u = current_tarjeta_user();


    return view('tarjeta.app.index', compact('u'));
  }
}
