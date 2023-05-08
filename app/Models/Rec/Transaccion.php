<?php

namespace App\Models\Rec;

use App\Models\De\Producto;
use App\Models\Inf\Usuario;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaccion extends Model
{
  use HasFactory;

  protected $table = 'rec_transaccion';

  CONST STATUS = [
    1 => 'OK',
    2 => 'PENDIENTE',
    3 => 'REEMBOLSO'
  ];

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function accion(){
    return $this->belongsTo(Accion::class,'id_accion');
  }

  public function producto(){
    return $this->belongsTo(Producto::class,'id_producto');
  }

  public function getFechaCreacion() {
    return (new ConvertDatetime($this->created_at));
  }

  public function getCredito() {
    return Currency::getConvert($this->credito) ?? 0;
  }

  public function getRawInfo() {
    return [
      'code' => $this->token,
      'credit' => [
        'number' => $this->credito,
        'text' => $this->getCredito(),
      ],
      'created_at' => [
        'simple' => $this->created_at,
        'text' => $this->getFechaCreacion()->getDateVersion()
      ],
      'accion' => [
        'name' => $this->accion->nombre ?? null,
        'description' => $this->accion->descripcion ?? null,
      ],
      'producto' => [
        'name' => $this->producto->nombre ?? null,
        'description' => $this->producto->descripcion ?? null,
      ],
      'status' => [
        'name' => self::STATUS[$this->estado],
        'code' => $this->estado
      ],
      'type' =>  $this->id_producto ? 'PRODUCT' : 'ACCION',
      'img' => $this->accion ? asset($this->accion->present()->getImagen()) : asset($this->producto->present()->getImagen())
    ];
  }
}
