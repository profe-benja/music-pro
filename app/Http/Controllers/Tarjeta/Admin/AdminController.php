<?php

namespace App\Http\Controllers\Tarjeta\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index() {
    $u = current_tarjeta_user();


    return view('tarjeta.admin.index', compact('u'));
  }
}
