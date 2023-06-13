<?php

namespace App\Services\Integrations\Sucursal;

use App\Services\Integrations\ApiClient;

class Musicpro extends ApiClient
{
  protected $baseUrl = 'http://music-pro.test/api/v1/bodega/';
  // protected $cuenta_origen;
  // protected $cuenta_destino;
  // protected $monto;
  // protected $descripcion;

  public function __construct(){

  }

  // public function buscarUsuarios() {
  //   return $this->sendRequest('GET', '');
  // }

  public function productos() {
    // return $this->sendRequestHttpGET( $this->baseUrl . 'producto');
    return $this->get( $this->baseUrl . 'producto');
  }
}
