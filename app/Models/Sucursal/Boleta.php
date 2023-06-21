<?php

namespace App\Models\Sucursal;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sucursal\ProductoPresenter;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Boleta extends Model
{
  use HasFactory;

  protected $table = 'sucursal_boleta';

  CONST STATUS = [
    0 => 'PENDIENTE DE PAGO',
    1 => 'PAGADO',
  ];


  // $table->string('forma_pago')->nullable();
  // $table->integer('estado')->default(0);

  public function detalle() {
    return $this->hasMany(DetalleBoleta::class, 'id_boleta')->with('producto');
  }

  public function solicitante() {
    return $this->belongsTo(Usuario::class, 'id_usuario_solicitante');
  }

  public function getPrecio() {
    return Currency::getConvert($this->total_pagado) ?? 0;
  }

  function getStatus() {
    return self::STATUS[$this->estado] ?? 'SIN ESTADO';
  }
}
