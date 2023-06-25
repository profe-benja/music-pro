<?php

namespace App\Services\Integrations\Bodega;

use App\Services\Integrations\ApiClient;

class CodeConClave extends ApiClient
{
  protected $baseUrl = 'http://10.15.209.16:5000/api/v1/';

  // GET /productos
  public function buscarProductos() {
    // reponse { id_producto: 1, nombre: 'producto 1', stock: 1000, stock: 10 }
    return $this->get('productos');
  }

  // POST /productos/solicitud
  public function enviarSolicitud() {
    try {
    # formato del json nuevo esto recibe
    # {
    #   "productos": [
    #     {
    #       "id": "1",
    #       "cantidad": 1
    #     },
    #     {
    #       "id": "2",
    #       "cantidad": 2
    #     }
    #   ],
    #   "nombre": "juan",
    #   "direccion": "su casa"
    # }

      $data= [
        'nombre' => 'benjamin',
        'direccion' => 'su casa av duoc san joaquin',
        'productos' => [
          [
            'id' => 1,
            'cantidad' => 1
          ],
          [
            'id' => 2,
            'cantidad' => 1
          ],
          [
            'id' => 3,
            'cantidad' => 1
          ],
          [
            'id' => 4,
            'cantidad' => 10
          ]
        ]
      ];

      return $this->post('productos/solicitud' , $data);
    } catch (\Throwable $th) {
      return "error";
    }
  }
}
