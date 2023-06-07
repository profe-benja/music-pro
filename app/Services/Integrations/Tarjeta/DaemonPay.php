<?php

namespace App\Services\Tarjeta\Integrations;

use App\Models\Tarjeta\Banco;

class DaemonPay extends ClientTransfer
{

  CONST URL = 'https://api.daemonpay.io/v1/';


  public function transferir() {
    $response = $this->post(self::URL, $this->build_params());

    // Obtener la respuesta
    if ($response->successful()) {
      // La solicitud fue exitosa (código de respuesta 2xx)
      $responseData = $response->json(); // Obtener la respuesta como JSON
      // Hacer algo con los datos de la respuesta
      return $response;
    } else {
      // La solicitud falló (código de respuesta diferente de 2xx)
      $statusCode = $response->status(); // Obtener el código de respuesta
      // Manejar el error de acuerdo a tus necesidades
      return $response;
    }
  }

  private function build_params() {
    return array(
      'usuario-origen' => 'BEATPAY',
      'usuario-destino' => $this->cuenta_destino,
      'total' => $this->monto,
    );
  }
}
