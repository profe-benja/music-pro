<?php

namespace App\Models\Tarjeta;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaccion extends Model
{
  use HasFactory;
  use HasFactory;

  const STATUS_PENDIENTE = 0;
  const STATUS_APROBADO = 1;
  const STATUS_RECHAZADO = 2;

  protected $table = 'tarjeta_transaccion';

  protected function info(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }


  // public function usuario(){
  //   return $this->belongsTo(Usuario::class,'id_usuario');
	// }

  // public function getSaldo() {
  //   return Currency::getConvert($this->saldo) ?? 0;
  // }

  public function getMonto() {
    return Currency::getConvert($this->monto) ?? 0;
  }

  public function tarjetaOrigen() {
    return $this->belongsTo(Tarjeta::class, 'id_tarjeta_origen');
  }

  public function bancoOrigen() {
    return $this->belongsTo(Banco::class, 'id_banco_origen');
  }

  public function tarjetaDestino() {
    return $this->belongsTo(Tarjeta::class, 'id_tarjeta_destino');
  }

  public function bancoDestino() {
    return $this->belongsTo(Banco::class, 'id_banco_destino');
  }
}
