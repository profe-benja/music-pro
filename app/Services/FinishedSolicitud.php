<?php

namespace App\Services;

use App\Models\De\Producto;
use App\Models\De\Solicitud;
use App\Models\Inf\Usuario;
use App\Models\Rec\Transaccion;

class FinishedSolicitud
{
  protected $solicitud_id;
  protected $usuario;
  protected $solicitud;
  protected $producto;
  protected $transaccion;
  protected $estado;
  protected $payload;

  const STATUS = [
    1 => ['success','Se ha aceptado la solicitud'],
    2 => ['info','No tiene dinero'],
    3 => ['info','No tiene stocks'],
    4 => ['warning','Supera la cantidad por usuario'],
    5 => ['error','Error. Intente nuevamente'],
    6 => ['success','Se ha rechazado la solicitud'],
    7 => ['error','No se puede modificar']
  ];

  public function __construct(int $solicitud_id, int $estado){
    $this->response();
    $this->solicitud_id = $solicitud_id;
    $this->estado = $estado;
  }

  public function call(){
    if ($this->is_validate_solicitud()) {
      if ($this->estado == 3) {
        $this->build();
      } else {
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
    }

    return $this->payload;
  }

  private function is_unlimited() {
    return $this->producto->stock_ilimitado;
  }

  private function has_stock() {
    return $this->producto->stock > 0 ? true : !$this->response(3);
  }

  private function has_product_solicitado() {
    if ($this->producto->cant_por_usuario_ilimitado) {
      return true;
    }

    $cant = Solicitud::where('id_usuario_solicitante', $this->usuario->id)
                      ->where('id_producto', $this->producto->id)
                      ->where('estado',2)
                      ->where('activo', true)
                      ->get()
                      ->count() ?? 0;

    return $this->producto->cant_por_usuario > $cant ? true : !$this->response(4);
  }

  private function is_validate_solicitud() {
    try {
      $s = Solicitud::with(['producto', 'usuario_solicitante', 'transaccion'])
                            ->where('estado',1)
                            ->findOrFail($this->solicitud_id);

      $this->solicitud = $s;
      $this->usuario = $s->usuario_solicitante;
      $this->producto = $s->producto;
      $this->transaccion = $s->transaccion;

      return true;
    } catch (\Throwable $th) {
      $this->response(7);
      return false;
    }
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

    // ACEPTADO
    if ($this->estado == 2) {
      $this->transaccion->estado = 1;
      $this->transaccion->update();

      $this->solicitud->id_usuario_receptor = current_user()->id;
      $this->solicitud->estado = 2;
      $this->solicitud->update();

      $this->producto->cant_entregada += 1;
      if (!$this->producto->stock_ilimitado) {
        $this->producto->stock -=1;
      }
      $this->producto->update();

      $this->response(1);
    } else {
      // RECHAZADO - REEMBOLSO
      if ($this->estado == 3) {

        $this->transaccion->estado = 3;
        $this->transaccion->update();

        $this->solicitud->id_usuario_receptor = current_user()->id;
        $this->solicitud->estado = 3;
        $this->solicitud->update();


        $this->usuario->credito += $this->solicitud->credito;
        $this->usuario->update();

        $this->response(6);
      } else {
        $this->response(7);
      }
    }
  }
}
