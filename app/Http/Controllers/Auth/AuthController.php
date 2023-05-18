<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bodega\Usuario;
use App\Models\Sistema\Config;
use App\Models\Sistema\Sistema;
use App\Models\Sucursal\Usuario as SucursalUsuario;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Usuario as TarjetaUsuario;
use App\Models\Transporte\Usuario as TransporteUsuario;
use Auth;
use Illuminate\Http\Request;


// use App\Http\Requests\AuthLoginRequest as AuthRequest;

class AuthController extends Controller
{
  // VIEW LOGIN
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

  // ACCESS LOGIN
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
        return redirect()->route('sucursal.index');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
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

  public function transporteLogin(Request $request) {
    try {
      $u = TransporteUsuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('trans_usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        // if ($u->admin) {
        //   return redirect()->route('home.index');
        // }
        return redirect()->route('transporte.home');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function tarjetaLogin(Request $request) {
    try {
      $u = TarjetaUsuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('card_usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        if ($u->admin) {
          return redirect()->route('tarjeta.admin.index');
        }
        return redirect()->route('tarjeta.app.index');

      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  // VIEW REGISTRO
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

  // STORE
  public function sucursalRegistroStore(Request $request) {
    try {
      $u = new SucursalUsuario();
      $u->correo = $request->input('correo');
      $u->username = $u->correo;
      $u->password = hash('sha256', $request->input('passw'));
      $u->nombre = $request->input('nombre');
      $u->apellido = $request->input('apellido');
      $u->run = $request->input('run');
      // $u->telefono = $request->input('telefono');
      $u->direccion = $request->input('direccion');
      $u->admin = false;
      $u->save();

      return redirect()->route('sucursal.acceso')->with('success','Usuario registrado correctamente.');
    } catch (\Throwable $th) {
      return $th;

      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function transporteRegistroStore(Request $request) {
    try {
      $u = new TransporteUsuario();
      $u->correo = $request->input('correo');
      $u->username = $u->correo;
      $u->password = hash('sha256', $request->input('passw'));
      $u->nombre = $request->input('nombre');
      $u->apellido = $request->input('apellido');
      $u->run = $request->input('run');
      // $u->telefono = $request->input('telefono');
      $u->direccion = $request->input('direccion');
      $u->admin = false;
      $u->save();

      return redirect()->route('transporte.acceso')->with('success','Usuario registrado correctamente.');
    } catch (\Throwable $th) {
      return $th;

      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function tarjetaRegistroStore(Request $request) {
    try {
      $u = new TarjetaUsuario();
      $u->correo = $request->input('correo');
      $u->username = $u->correo;
      $u->password = hash('sha256', $request->input('passw'));
      $u->nombre = $request->input('nombre');
      $u->apellido = $request->input('apellido');
      $u->run = $request->input('run');
      $u->admin = false;
      $u->save();

      $t = new Tarjeta();
      $t->id_usuario = $u->id;
      $t->nro = $u->id . '0000' . substr($u->run, 0, strlen($u->run) - 1);
      $t->pin = '';
      $t->saldo = 0;
      $t->save();

      Auth::guard('card_usuario')->loginUsingId($u->id);
      $this->start_sesions($u);

      return redirect()->route('tarjeta.app.index')->with('success','Usuario registrado correctamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  // LOGOUT
  public function logout(){
    close_sessions();
    return redirect()->route('root');
  }

  public function start_sesions($u) {
    return true;
  }
}
