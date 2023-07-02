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

  public function getNro() {
    $numero = $this->nro;
    $numero_con_espacios = '';

    for ($i = 0; $i < strlen($numero); $i++) {
      $numero_con_espacios .= $numero[$i];

      // Agregar espacio después de cada grupo de 4 letras
      if (($i + 1) % 4 == 0 && $i != strlen($numero) - 1) {
        $numero_con_espacios .= ' ';
      }
    }

    return $numero_con_espacios;
  }

  public function get_rawinfo() {
    return [
      'nro' => $this->nro,
      'saldo' => $this->saldo,
    ];
  }
}
