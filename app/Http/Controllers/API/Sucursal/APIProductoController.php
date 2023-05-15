<?php

namespace App\Http\Controllers\API\Sucursal;

use App\Http\Controllers\Controller;
use App\Models\Sucursal\Producto;
use Illuminate\Http\Request;



class APIProductoController extends Controller
{
  public function find(Request $r) {

    $codigo = $r->input('code');
    $id = $r->input('id');

    $response = array(
      'status'  => 404,
      'result' => array(
        'product'    => null,
      )
    );

    $p = Producto::where('codigo',$codigo)->find($id);

    if ($p) {
      $raw_info = $p->getRawInfo();
      $raw_info['img'] = $raw_info['asset'];
      $raw_info['product_name'] = $p->nombre;

      $response['status'] = 200;
      $response['result']['product'] = $raw_info;
    }
    return $response;
  }
}
