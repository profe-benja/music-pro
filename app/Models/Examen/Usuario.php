<?php

namespace App\Models\Examen;

use App\Services\Currency;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Authenticatable
{
  use Notifiable;
  use HasFactory;

  protected $table = 'admin_usuario';

  protected $guard = 'admin_usuario';

  const TIPOS = [
    1 => 'a',
    2 => 'b',
    3 => 'c'
  ];

  protected function info(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  public function scopefindByUsername($query, $username){
    return $query->where('username',$username)->where('activo',true);
  }

  public function get_usuario(){
    return self::TIPOS[$this->tipo_usuario] ?? '';
  }


  public function nombre_completo() {
    return $this->nombre . ' ' . $this->apellido;
  }

  // public function myQR() {
  //   return (new JwtQrEncode($this))->call();
  // }

  public function getCredito() {
    return Currency::getConvert($this->credito) ?? 0;
  }
}
