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

  CONST FORMA_PAGO = [
    1 => 'SIN SOLICITUD',
    2 => 'CON SOLICITUD',
    3 => 'FINALIZADOS'
  ];

  CONST STATUS = [
    1 => 'SIN SOLICITUD',
    2 => 'CON SOLICITUD',
    3 => 'FINALIZADOS'
  ];

  // $table->string('forma_pago')->nullable();
  // $table->integer('estado')->default(0);


  public function solicitante() {
    return $this->belongsTo(Usuario::class, 'id_usuario_solcitante');
  }

  public function getPrecio() {
    return Currency::getConvert($this->total_pagado) ?? 0;
  }
}
