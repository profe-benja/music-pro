<?php

namespace App\Services\Jwt;

use App\Models\Inf\Usuario;
use Firebase\JWT\JWT;

use Firebase\JWT\Key;

class JwtQrDecode extends JwtQR
{
  private $jwt;

  function __construct($jwt) {
    $this->jwt = $jwt;
  }

  public function call(){
    return $this->build();
  }

  // PRIVATE

  private function build() {
    try {
      $data = $this->jwt_decode();
      $time = time() + (5*60);

      if (!empty($data['email'])) {
        if ( $data['iat'] < $time ) {
          return Usuario::where('correo', $data['email'])->findOrFail($data['id']);
        }
        return 409;
      }

      return 404;
    } catch (\Throwable $th) {
      return 500;
    }
  }

  private function jwt_decode(){
    $jwt = (array) JWT::decode($this->jwt,  new Key(self::TOKEN, 'HS256'));
    $data = (array) $jwt['data'];
    return $data;
  }
}
