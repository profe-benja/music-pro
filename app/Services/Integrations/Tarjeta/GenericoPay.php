<?php

namespace App\Services\Integrations\Tarjeta;

use App\Models\Tarjeta\Banco;
use App\Services\Integrations\ApiClient;
use App\Services\Integrations\ApiConn;
use Illuminate\Support\Facades\Http;


class GenericoPay extends ApiConn
{
  protected $baseUrl;
  // protected $baseUrl = 'http://192.168.60.94:5000/api/v1/';
  protected $cuenta_origen;
  protected $cuenta_destino;
  protected $monto;
  protected $descripcion;

  public function __construct($API, $cuenta_origen = null, $cuenta_destino = null, $monto = null, $descripcion = null) {
    $this->baseUrl = $API . '/api/v1/';
    $this->cuenta_origen = $cuenta_origen;
    $this->cuenta_destino = $cuenta_destino;
    $this->monto = $monto;
    $this->descripcion = $descripcion;
  }

  public function tranferir() {
    $data = $this->build_params();
    return $this->post('transferencia', $data);
  }

  // PRIVATE
  private function build_params() {
    return array(
      'banco_origen' => 'BEATPAY',
      'tarjeta_origen' => $this->cuenta_origen,
      'tarjeta_destino' => $this->cuenta_destino,
      'monto' => $this->monto,
      'comentario' => $this->descripcion ?? '',
    );
  }
}
