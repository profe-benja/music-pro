
<?php

use App\Models\Inf\Usuario;

/**
 * session user
 *
 * @return only true
 */
function current_user() {
  return auth('usuario')->user();
}

function close_sessions() {
  if(Auth::guard('usuario')->check()) {
    Auth::guard('usuario')->logout();
  }

  // if(Auth::guard('inscripcion')->check()){
  //   Auth::guard('inscripcion')->logout();
  // }
  // session()->flush();
  session()->forget('gp_config');
  return true;
}

function current_config() {
  return session()->get('gp_config');
}

function current_sistema() {
  return session()->get('gp_sistema');
}
