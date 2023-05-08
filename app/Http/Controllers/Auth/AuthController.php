<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Inf\Config;
use App\Models\Inf\Sistema;
use App\Models\Inf\Usuario;
use Auth;
use Illuminate\Http\Request;


// use App\Http\Requests\AuthLoginRequest as AuthRequest;

class AuthController extends Controller
{
  public function index() {
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

  public function acceso() {
    $s = Sistema::first();
    return view('auth.index', compact('s'));
  }

  public function login(Request $request){
    try {
      $u = Usuario::findByUsername($request->user)->firstOrFail();
      $pass =  hash('sha256', $request->pass);
      if($u->password==$pass){

        Auth::guard('usuario')->loginUsingId($u->id);
        $this->start_sesions($u);

        if ($u->admin) {
          return redirect()->route('home.index');
        }
        return redirect()->route('login');

        // return redirect()->route('webapp.index');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

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
