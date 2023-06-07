<?php

namespace App\Services\Tarjeta\Integrations;

use App\Models\Tarjeta\Banco;
use App\Services\Integrations\ApiConnection;
use Illuminate\Support\Facades\Http;


class ClientTransfer extends ApiConnection
{
  protected $cuenta_origen;
  protected $cuenta_destino;
  protected $monto;
  protected $descripcion;

  public function __construct($cuenta_origen, $cuenta_destino, $monto, $descripcion){
    $this->cuenta_origen = $cuenta_origen;
    $this->cuenta_destino = $cuenta_destino;
    $this->cuenta_origen = $monto;
    $this->descripcion = $descripcion;
  }


}
