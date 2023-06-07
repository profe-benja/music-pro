<?php

namespace App\Models\Sucursal;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sucursal\ProductoPresenter;

use Illuminate\Database\Eloquent\Casts\Attribute;


class DetalleBoleta extends Model
{
  use HasFactory;

  protected $table = 'sucursal_detalle_boleta';

  public function boleta() {
    return $this->belongsTo(Boleta::class, 'id_boleta');
  }

  public function producto() {
    return $this->belongsTo(Producto::class, 'id_producto');
  }

  public function getPrecio() {
    return Currency::getConvert($this->precio) ?? 0;
  }

  public function getTotal() {
    return Currency::getConvert($this->total) ?? 0;
  }
}
