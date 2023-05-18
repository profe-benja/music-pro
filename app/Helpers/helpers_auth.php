
<?php

use App\Models\Inf\Usuario;

/**
 * session user
 *
 * @return only true
 */
function current_bodega_user() {
  return auth('bode_usuario')->user();
}

function current_tarjeta_user() {
  return auth('card_usuario')->user();
}


function current_transporte_user() {
  return auth('trans_usuario')->user();
}

function current_store_user() {
  return auth('store_usuario')->user();
}



function close_sessions() {
  $perfiles = ['bode_usuario', 'card_usuario', 'trans_usuario', 'store_usuario'];
  foreach ($perfiles as $perfil) {
    if(Auth::guard($perfil)->check()) {
      Auth::guard($perfil)->logout();
    }
  }

  // if(Auth::guard('inscripcion')->check()){
  //   Auth::guard('inscripcion')->logout();
  // }
  // session()->flush();
  session()->forget('gp_config');
  return true;
}
