<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bodega\Usuario;
use App\Models\Sistema\Config;
use App\Models\Sistema\Sistema;
use App\Models\Sucursal\Usuario as SucursalUsuario;
use Auth;
use Illuminate\Http\Request;


// use App\Http\Requests\AuthLoginRequest as AuthRequest;

class AuthController extends Controller
{
  public function acceso() {
    $s = Sistema::first();
    return view('auth.index', compact('s'));
  }

  public function bodegaAcceso() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    return view('auth.bodega', compact('s','user','pass'));
  }

  public function bodegaLogin(Request $request) {
    try {
      $u = Usuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('bode_usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        // if ($u->admin) {
        //   return redirect()->route('home.index');
        // }
        return redirect()->route('bodega.home');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function sucursalAcceso() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = true;

    return view('auth.sucursal', compact('s','user','pass','admin'));
  }

  public function sucursalLogin(Request $request) {
    try {
      $u = SucursalUsuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('store_usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        // if ($u->admin) {
        //   return redirect()->route('home.index');
        // }
        return redirect()->route('sucursal.home');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function sucursalAccesoCliente() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.sucursal', compact('s','user','pass','admin'));
  }

  public function sucursalLoginCliente(Request $request) {
    try {
      $u = SucursalUsuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('store_usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        // if ($u->admin) {
        //   return redirect()->route('home.index');
        // }
        return redirect()->route('sucursal.home');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function sucursalRegistro() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.sucursal_registro', compact('s','user','pass','admin'));
  }

  public function transporteAcceso() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = true;

    return view('auth.transporte', compact('s','user','pass','admin'));
  }

  public function transporteAccesoCliente() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.transporte', compact('s','user','pass','admin'));
  }

  public function transporteRegistro() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.transporte_registro', compact('s','user','pass','admin'));
  }

  public function tarjetaAcceso() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = true;

    return view('auth.tarjeta', compact('s','user','pass','admin'));
  }

  public function tarjetaAccesoCliente() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.tarjeta', compact('s','user','pass','admin'));
  }

  public function tarjetaRegistro() {
    $s = Sistema::first();

    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.tarjeta_registro', compact('s','user','pass','admin'));
  }

  // public function login(Request $request){
  //   try {
  //     $u = Usuario::findByUsername($request->user)->firstOrFail();
  //     $pass =  hash('sha256', $request->pass);
  //     if($u->password==$pass){

  //       Auth::guard('usuario')->loginUsingId($u->id);
  //       $this->start_sesions($u);

  //       if ($u->admin) {
  //         return redirect()->route('home.index');
  //       }
  //       return redirect()->route('login');

  //       // return redirect()->route('webapp.index');
  //     }else{
  //       return back()->with('info','Error. Intente nuevamente.');
  //     }
  //   } catch (\Throwable $th) {
  //     // return $th;
  //     return back()->with('info','Error. Intente nuevamente.');
  //   }
  // }

  public function logout(){
    close_sessions();
    return redirect()->route('root');
  }

  public function start_sesions($u) {
    $config = Config::first();
    $sistema = Sistema::first();

    session([
      'gp_config' => $config,
      'gp_sistema' => $sistema
    ]);

    return true;
  }
}
