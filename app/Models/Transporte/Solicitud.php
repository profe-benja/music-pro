<?php

namespace App\Models\Transporte;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Solicitud extends Model
{
  use HasFactory;

  protected $table = 'transporte_solicitud';

  const STATUS = [
    'En proceso',
    'En camino',
    'Entregado',
  ];
   // 0: en proceso, 1: en camino, 2: entregado

  protected function info(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  public function getEstado() {
    return self::STATUS[$this->estado];
  }

  function get_raw_info() {
    return [
      'codigo_seguimiento' => $this->codigo_seguimiento,
      'tipo' => $this->tipo ?? '',
      'nombre_origen' => $this->nombre_origen ?? '',
      'direccion_origen' => $this->direccion_origen ?? '',
      'nombre_destino' => $this->nombre_destino ?? '',
      'direccion_destino' => $this->direccion_destino ?? '',
      'comentario' => $this->comentario ?? '',
      'estado' => $this->getEstado(),
      'info' => $this->info ?? [],
    ];
  }
}
