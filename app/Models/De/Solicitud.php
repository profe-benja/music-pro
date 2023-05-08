<?php

namespace App\Models\De;

use App\Models\Inf\Usuario;
use App\Models\Rec\Transaccion;
use App\Services\ConvertDatetime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Solicitud extends Model
{
  use HasFactory;

  protected $table = 'de_solicitud';

  CONST STATUS = [
    1 => 'PENDIENTE',
    2 => 'ACEPTADO',
    3 => 'RECHAZADO'
  ];

  public function usuario_solicitante(){
    return $this->belongsTo(Usuario::class,'id_usuario_solicitante');
  }

  public function usuario_receptor(){
    return $this->belongsTo(Usuario::class,'id_usuario_receptor');
  }

  public function producto(){
    return $this->belongsTo(Producto::class,'id_producto');
  }

  public function transaccion(){
    return $this->belongsTo(Transaccion::class,'id_transaccion');
  }

  public function getFechaCreacion() {
    return (new ConvertDatetime($this->created_at));
  }


  // public function present(){
  //   return new ProductoPresenter($this);
  // }

  // public function getPrecio() {
  //   return Currency::getConvert($this->precio) ?? 0;
  // }
}
