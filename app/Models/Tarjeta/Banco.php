<?php

namespace App\Models\Tarjeta;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banco extends Model
{
  use HasFactory;
  use HasFactory;

  protected $table = 'tarjeta_banco';

  // public function usuario(){
  //   return $this->belongsTo(Usuario::class,'id_usuario');
	// }

  // public function getSaldo() {
  //   return Currency::getConvert($this->saldo) ?? 0;
  // }
}
