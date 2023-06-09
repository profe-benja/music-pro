<?php

namespace App\Models\Sucursal;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sucursal\ProductoPresenter;

use Illuminate\Database\Eloquent\Casts\Attribute;


class BodegaAPI extends Model
{
  use HasFactory;

  protected $table = 'sucursal_bodega_api';

  // CONST STATUS = [
  //   1 => 'SIN SOLICITUD',
  //   2 => 'CON SOLICITUD',
  //   3 => 'FINALIZADOS'
  // ];

  // <option value="1" {{ $p->estado == 1 ? 'selected' : '' }}>Borrador</option>
  // <option value="2" {{ $p->estado == 2 ? 'selected' : '' }}>No disponible</option>
  // <option value="3" {{ $p->estado == 3 ? 'selected' : '' }}>Disponible</option>

  protected function integrations(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }


  public function solicitudes() {
    return $this->hasMany(BodegaSolicitudAPI::class, 'id_bodega');
  }


  public function inteUrlProductos() {
    return $this->integrations['url_productos'] ?? null;
  }

  public function inteUrlSolicitud() {
    return $this->integrations['url_solicitud'] ?? null;
  }

  // public function present(){
  //   return new ProductoPresenter($this);
  // }

  // public function getPrecio() {
  //   return Currency::getConvert($this->precio) ?? 0;
  // }
}
