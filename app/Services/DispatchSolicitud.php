<?php

namespace App\Services;

use App\Models\De\Producto;
use App\Models\De\Solicitud;
use App\Models\Inf\Usuario;
use App\Models\Rec\Transaccion;

class DispatchSolicitud
{
  protected $usuario;
  protected $producto;
  protected $payload;

  const STATUS = [
    1 => ['success','¡Felicidades! Se ha enviado su solicitud'],
    2 => ['info','No tiene dinero'],
    3 => ['info','No tiene stocks'],
    4 => ['warning','Tenemos un problema. <br> Ya ha superado la cantidad por usuario'],
    5 => ['danger','Error. Intente nuevamente']
  ];

  public function __construct(Usuario $usuario, Producto $producto){
    $this->usuario = $usuario;
    $this->producto = $producto;
    $this->response();
  }

  public function call(){
    if ($this->has_credit()) {
      if ($this->has_product_solicitado()) {
        if ($this->is_unlimited()) {
            $this->build();
        } else {
          if ($this->has_stock()) {
            $this->build();
          }
        }
      }
    }

    return $this->payload;
  }

  private function is_unlimited() {
    return $this->producto->stock_ilimitado;
  }

  private function has_stock() {
    return $this->producto->stock > 0 ? true : !$this->response(3);
  }

  private function has_credit() {
    return $this->producto->precio <= $this->usuario->credito ? true : !$this->response(2);
  }

  private function has_product_solicitado() {
    if ($this->producto->cant_por_usuario_ilimitado) {
      return true;
    }

    $cant = Solicitud::where('id_usuario_solicitante', $this->usuario->id)
                      ->where('id_producto', $this->producto->id)
                      ->whereIn('estado',[1,2])
                      ->where('activo', true)
                      ->get()
                      ->count() ?? 0;

    return $this->producto->cant_por_usuario > $cant ? true : !$this->response(4);
  }

  private function response($code = 5) {
    $this->payload = [
      'code' => $code,
      'status' => self::STATUS[$code][0],
      'message' => self::STATUS[$code][1]
    ];

    return true;
  }

  private function build() {

    $t = new Transaccion();
    $t->token = time() . $this->usuario->id;
    $t->id_usuario = $this->usuario->id;
    // $t->id_accion = $this->accion->id;
    $t->id_producto = $this->producto->id;
    $t->tipo = false;
    $t->credito = $this->producto->precio;
    // $t->nombre = $this->accion->nombre;
    // $t->descripcion = $this->accion->descripcion;
    $t->estado = 2; //pendiente
    $t->save();


    $s = new Solicitud();

    $s->token = time() . $this->usuario->id;
    $s->id_usuario_solicitante = $this->usuario->id;
    $s->id_transaccion = $t->id;
    $s->id_producto = $this->producto->id;
    $s->credito = $this->producto->precio;
    // $s->nombre = $p->nombre;
    // $s->descripcion = $p->descripcion;
    $s->estado = 1;
    $s->save();

    $u = current_user();
    $u->credito -= $this->producto->precio;
    $u->update();

    $this->response(1);
  }
}
