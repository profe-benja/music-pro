<?php

namespace App\Services\Integrations\Sucursal;

use App\Services\Integrations\ApiConnection;

class CyberEdge extends ApiConnection
{
  protected $baseUrl = 'http://192.168.137.172:3001/api/';
  // protected $cuenta_origen;
  // protected $cuenta_destino;
  // protected $monto;
  // protected $descripcion;

  public function __construct(){

  }

  public function productos() {
    return $this->sendRequestHttpGET( $this->baseUrl . 'productos');
  }

  // public function solicitud() {
  //   return $this->sendRequestHttpPost( $this->baseUrl . 'productos', $data);
  // }
}
