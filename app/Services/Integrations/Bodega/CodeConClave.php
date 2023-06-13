<?php

namespace App\Services\Integrations\Bodega;

use App\Services\Integrations\ApiConnection;

class CodeConClave extends ApiConnection
{
  protected $baseUrl = 'http://192.168.137.154:5000/api/v1/';

  // GET /productos
  public function buscarProductos() {
    // reponse { id_producto: 1, nombre: 'producto 1', stock: 1000, stock: 10 }
    return $this->sendRequest('GET', 'productos');
  }

  // POST /productos/solicitud
  public function enviarSolicitud() {
    try {
      // $data = [
      //   'ids_productos' => [1,2,3,4]
      // ];

      $data= [
        'productos' => [
          [
            'id' => 1,
            'cantidad' => 10
          ],
          [
            'id' => 2,
            'cantidad' => 10
          ],
          [
            'id' => 3,
            'cantidad' => 10
          ],
          [
            'id' => 4,
            'cantidad' => 10
          ]
        ]
      ];

      return $this->sendRequest('POST', 'productos/solicitud' , $data);
    } catch (\Throwable $th) {
      return "error";
    }
  }
}
