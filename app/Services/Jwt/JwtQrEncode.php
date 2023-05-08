<?php

namespace App\Services\Jwt;

use App\Models\Inf\Usuario;
use Firebase\JWT\JWT;

class JwtQrEncode extends JwtQR
{
  private $usuario;

  function __construct(Usuario $usuario) {
    $this->usuario = $usuario;
  }

  public function call(){
    return $this->jwt();
  }

  // PRIVATE

  private function jwt(){
    try {
      $time = time();
      $token = array(
          'iat' => $time, // Tiempo que inició el token
          // 'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
          'exp' => $time + (5*60),
          'data' => [ // información del usuario
            'id' => $this->usuario->id,
            'name' => $this->usuario->nombre,
            'email' => $this->usuario->correo,
            'iat' => $time,
            'exp' => $time * (5*60)
          ]
      );

      return JWT::encode($token, self::TOKEN, 'HS256' );
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
