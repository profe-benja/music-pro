<?php

namespace App\Services\Integrations\Tarjeta;

use App\Services\Integrations\ApiConnection;

class ByteBuilders extends ApiConnection
{
  protected $baseUrl = 'http://172.20.10.5:5000/api/v1/';
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

  // public function buscarUsuarios() {
  //   return $this->sendRequest('GET', '');
  // }

  public function tranferir() {
    $data = $this->build_params();
    return $this->sendRequest('POST', 'trasferir', $data);
  }

  public function tranferirTest() {
    $data = $this->build_params_fake();
    return $this->sendRequest('POST', 'trasferir', $data);
  }

  // PRIVATE
  private function build_params() {
    return array(
      'cuenta_origen' => $this->cuenta_origen,
      'banco' => 'BEATPAY',
      'cuenta_destino' => $this->cuenta_destino,
      'monto' => $this->monto,
      'descripcion' => $this->descripcion,
    );
  }

  private function build_params_fake() {
    return array(
      'cuenta_origen' => 1111111,
      'banco' => 'BEATPAY',
      'cuenta_destino' => 123123,
      'monto' => 3000,
      'descripcion' => 'dinero',
    );
  }
}
