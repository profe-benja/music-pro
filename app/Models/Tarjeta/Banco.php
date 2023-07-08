<?php

namespace App\Models\Tarjeta;

use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Banco extends Model
{
  use HasFactory;

  protected $table = 'tarjeta_banco';

  // public function usuario(){
  //   return $this->belongsTo(Usuario::class,'id_usuario');
	// }

  // public function getSaldo() {
  //   return Currency::getConvert($this->saldo) ?? 0;
  // }

  // protected function endpoint(): Attribute {
  //   return Attribute::make(
  //       get: fn ($value) => json_decode($value, true),
  //       set: fn ($value) => json_encode($value),
  //   );
  // }

  // public function endponitTransfer() {
  //   return $this->endpoint['transfer'] ?? 'transferir';
  // }

}
