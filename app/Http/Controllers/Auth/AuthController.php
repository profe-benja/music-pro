<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tarjeta\Admin\UsuarioController;
use App\Models\Bodega\Usuario;
use App\Models\Sucursal\Usuario as SucursalUsuario;
use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario as TarjetaUsuario;
use App\Models\Transporte\Usuario as TransporteUsuario;
use App\Services\EmailServices;
use Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

// use App\Http\Requests\AuthLoginRequest as AuthRequest;

class AuthController extends Controller
{
  // VIEW LOGIN
  public function bodegaAcceso() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    return view('auth.bodega', compact('user','pass'));
  }

  public function sucursalAcceso() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = true;

    return view('auth.sucursal', compact('user','pass','admin'));
  }

  public function sucursalAccesoCliente() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.sucursal', compact('user','pass','admin'));
  }

  public function transporteAcceso() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = true;

    return view('auth.transporte', compact('user','pass','admin'));
  }

  public function transporteAccesoCliente() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.transporte', compact('user','pass','admin'));
  }

  public function tarjetaAcceso() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = true;

    return view('auth.tarjeta', compact('user','pass','admin'));
  }

  public function tarjetaAccesoCliente() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.tarjeta', compact('user','pass','admin'));
  }

  // ACCESS LOGIN
  public function sucursalLogin(Request $request) {
    try {
      $u = SucursalUsuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('store_usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        if ($u->admin) {
          return redirect()->route('sucursal.home');
        }
        // $token = Auth::guard('store_usuario')->issueToken();

        // $token = JWTAuth::fromUser(Auth::guard('store_usuario')->user());
        // $token = auth()->login($u);

        // return $token;
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
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  // VIEW REGISTRO
  public function sucursalRegistro() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.sucursal_registro', compact('user','pass','admin'));
  }

  public function transporteRegistro() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.transporte_registro', compact('user','pass','admin'));
  }

  public function tarjetaRegistro() {
    $user = '';
    $pass = '';

    if (app()->isLocal()) {
      $user = 'admin@musicpro.cl';
      $pass = '123456';
    }

    $admin = false;

    return view('auth.tarjeta_registro', compact('user','pass','admin'));
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
      $u->getSecretKey();


      $t = new Tarjeta();
      $t->id_usuario = $u->id;
      $t->nro = ($u->id * 100) . substr($u->run, 0, strlen($u->run) - 1);
      $t->pin = '';
      $t->id_banco = 1;
      $t->saldo = 10000;
      $t->save();

      $tr = new Transaccion();
      $tr->id_tarjeta_origen = 1;
      $tr->id_banco_origen = 1;
      $tr->code_banco_origen = 'BETPAY';

      $tr->id_tarjeta_destino = $t->id;
      $tr->nro_tarjeta_destino = $t->nro;
      $tr->id_banco_destino = 1;
      $tr->code_banco_destino = 'BEATPAY';
      $tr->descripcion = 'Carga inicial';
      $tr->monto = 10000;
      $tr->estado = 1;
      $tr->save();

      $tarjeta_banco = Tarjeta::find(1);
      $tarjeta_banco->saldo = $tarjeta_banco->saldo - $tr->monto;
      $tarjeta_banco->update();

      Auth::guard('card_usuario')->loginUsingId($u->id);
      $this->start_sesions($u);

      return redirect()->route('tarjeta.app.index')->with('success','Usuario registrado correctamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function tarjetaReset() {
    return view('auth.tarjeta_reset');
  }

  public function tarjetaResetRequest(Request $request) {
    try {
      $u = Usuario::where('correo', $request->correo)->firstOrFail();
      $numero = rand(100000, 999999);
      $u->password = hash('sha256', $numero);
      $u->update();

      $content = '
        <p>Se ha recuperado su contraseña, su nueva contraseña es: <strong>'.$numero.'</strong></p>
      ';
      $e = (new EmailServices('Recuperacion', $u->correo, '' , $content))->send();

      if (!$e['error']) {
        return back()->with('success','Se ha actualizado la contraseña');
      }
      return back()->with('danger','Error. Intente nuevamente.');
    } catch (\Throwable $th) {
      return back()->with('danger','Error. Intente nuevamente.');
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
