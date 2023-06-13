<?php

namespace App\Services\Integrations\Transporte;

use App\Services\Integrations\ApiConnection;

// 007D
class GranJVCorp extends ApiConnection
{
  protected $baseUrl = 'http://192.168.137.22:5000/api/v1/';
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

  public function pedidosAll() {

    // return $this->sendRequestHttpGET('GET', $this->baseUrl . 'pedidos.json');
    return $this->sendRequest('GET', $this->baseUrl . 'pedidos');
  }

  public function pedidos() {
    $data = $this->build_params();
    return $this->sendRequest('POST', 'pedidos', $data);
  }

  // PRIVATE
  private function build_params() {
    return array(
      'usuario-origen' => 'BEATPAY',
      'usuario-destino' => $this->cuenta_destino,
      'total' => $this->monto,
    );
  }
}
