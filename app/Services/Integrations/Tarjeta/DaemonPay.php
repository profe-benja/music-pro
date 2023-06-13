<?php

namespace App\Services\Integrations\Tarjeta;

use App\Models\Tarjeta\Banco;
use App\Services\Integrations\ApiConnection;

use Illuminate\Support\Facades\Http;


class DaemonPay extends ApiConnection
{
  protected $baseUrl = 'http://192.168.60.94:5000/api/v1/';
  protected $cuenta_origen;
  protected $cuenta_destino;
  protected $monto;
  protected $descripcion;

  public function __construct($cuenta_origen = null, $cuenta_destino = null, $monto = null, $descripcion = null) {
    $this->cuenta_origen = $cuenta_origen;
    $this->cuenta_destino = $cuenta_destino;
    $this->cuenta_origen = $monto;
    $this->descripcion = $descripcion;
  }

  public function tranferir() {
    $data = $this->build_params();
    return $this->sendRequest('POST', 'transferencia', $data);
  }

  public function tranferirTest() {
    $data = $this->build_params_test();
    return $this->sendRequest('POST', 'trasferir', $data);
  }

  // PRIVATE
  private function build_params() {
    return array(
      'usuario-origen' => 'BEATPAY',
      'usuario-destino' => $this->cuenta_destino,
      'total' => $this->monto,
    );
  }

  private function build_params_test() {
    return array(
      'usuario-origen' => 'BEATPAY',
      'usuario-destino' => 'DAEMON',
      'total' => 1000,
    );
  }

  function send(){

    $response = Http::get('http://192.168.60.94:5000/api/v1/');

    if ($response->successful()) {
        $data = $response->json();
        // Procesa la respuesta JSON devuelta por el servidor
    } else {
        $statusCode = $response->status();
        // Maneja el código de estado de error
    }
  }

  function post() {
    $response = Http::post('http://192.168.60.94:5000/api/v1/transferencia/', $this->build_params_test());

    if ($response->successful()) {
        return $response->json();
        // Procesa la respuesta JSON devuelta por el servidor
    } else {
        return $response->status();
        // Maneja el código de estado de error
    }
  }
}
