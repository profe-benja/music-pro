<?php

namespace App\Models\Tarjeta;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tarjeta extends Model
{
  use HasFactory;
  use HasFactory;

  protected $table = 'tarjeta_tarjeta';

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
	}

  public function getSaldo() {
    return Currency::getConvert($this->saldo) ?? 0;
  }

  public function transaccionesOrigen() {
    return $this->hasMany(Transaccion::class, 'id_tarjeta_origen');
  }

  public function transaccionesDestino() {
    return $this->hasMany(Transaccion::class, 'id_tarjeta_destino');
  }

  public function banco() {
    return $this->belongsTo(Banco::class, 'id_banco');
  }
}
