<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\De\Producto;
use App\Models\De\Solicitud;
use App\Models\Inf\Usuario;
use App\Models\Rec\Accion;
use App\Models\Rec\Transaccion;
use App\Services\FormularioSocioeconomico;
use App\Services\Jwt\JwtFirmaDecode;
use App\Services\Jwt\JwtFirmaEncode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

  public function index() {
    $reports = [
      'count_solicitudes' => 0
    ];

    $reports['count_solicitudes'] = Solicitud::where('estado',1)->where('activo', true)->get()->count();

    return view('home.index', compact('reports'));
  }

  public function home() {
    $formulario = (new FormularioSocioeconomico())->call();

    // return $formulario['GENERAL']['values'][10][0];

    return view('home.home', compact(['formulario']));
  }


  public function form() {
    $formulario = (new FormularioSocioeconomico())->call();

    return view('home.form', compact(['formulario']));
  }

  public function auth() {
    return view('auth.index');
  }

  // public function jwt()
  // {
  //   $a = Alumno::first();
  //   $jwt = new JwtFirmaEncode($a);

  //   return $jwt->call();
  // }

  // public function jwtShow($jwt)
  // {
  //   try {
  //     $obj = new JwtFirmaDecode($jwt);
  //     $a = $obj->call();


  //     if (!$a->nombre) {
  //       $status = 'no esta habilitado para firmar';
  //       return view('home.verificar',compact(['status']));
  //     }
  //     if (!empty($a)) {
  //       return view('home.firma', compact('jwt','a'));
  //     }


  //   } catch (\Throwable $th) {
  //     return view('home.verificar')->with('success','Hemos recibido su firma');
  //   }
  // }

  public function reset() {
    $usuarios = Usuario::get();
    $acciones = Accion::get();
    $productos = Producto::get();

    foreach ($usuarios as $u) {
      $u->credito = 0;
      $u->update();
    }

    foreach ($acciones as $a) {
      $a->stock += $a->cant_entregada ?? 0;
      $a->cant_entregada = 0;
      $a->update();
    }

    foreach ($productos as $p) {
      $p->stock += $p->cant_entregada ?? 0;
      $p->cant_entregada = 0;
      $p->update();
    }

    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    Solicitud::truncate();
    Transaccion::truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

  }
}
