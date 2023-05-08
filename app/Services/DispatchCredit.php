<?php

namespace App\Services;

use App\Models\Inf\Usuario;
use App\Models\Rec\Accion;
use App\Models\Rec\Transaccion;

class DispatchCredit
{
  protected $usuario;
  protected $accion;
  protected $payload;

  const STATUS = [
    1 => ['success','Se ha entregado recompensa correctamente'],
    2 => ['warning','No se puede entregar recompensa'],
    3 => ['info','Limite por usuario superado'],
    4 => ['danger','Error. Intente nuevamente'],
  ];

  public function __construct(Usuario $usuario, Accion $accion){
    $this->usuario = $usuario;
    $this->accion = $accion;
    $this->response(4);
  }

  public function call(){
    if ($this->is_validate_limit()) {
      if ($this->is_validate_per_user()) {
        $this->build();
      }
    }

    return $this->payload;
  }

  private function is_validate_limit() {
    if ($this->accion->stock_ilimitado) {
      return true;
    } else {
      if ($this->accion->stock > 0) {
        return true;
      }
    }

    $this->response(2);
    return false;
  }

  private function is_validate_per_user() {
    if ($this->accion->cant_por_usuario_ilimitado) {
      return true;
    } else {
      $count_acciones = Transaccion::where('id_usuario', $this->usuario->id)
                            ->where('id_accion', $this->accion->id)
                            ->get()->count() ?? 0;

      if ($this->accion->cant_por_usuario > $count_acciones) {
        return true;
      }
    }

    $this->response(3);
    return false;
  }

  private function response($code) {
    $this->payload = [
      'code' => $code,
      'status' => self::STATUS[$code][0],
      'message' => self::STATUS[$code][1]
    ];
  }

  private function build() {
    $this->usuario->credito += $this->accion->credito;
    $this->usuario->update();

    $this->accion->cant_entregada += 1;
    $this->accion->stock -= 1;
    $this->accion->update();

    $t = new Transaccion();
    $t->token = time() . '-' . $this->accion->token;
    $t->id_usuario = $this->usuario->id;
    $t->id_accion = $this->accion->id;
    $t->tipo = true;
    $t->credito = $this->accion->credito;
    $t->nombre = $this->accion->nombre;
    $t->descripcion = $this->accion->descripcion;
    $t->estado = 1;
    $t->save();

    $this->response(1);
  }
}
