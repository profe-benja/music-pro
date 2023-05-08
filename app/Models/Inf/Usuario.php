<?php

namespace App\Models\Inf;

use App\Models\Rec\Transaccion;
use App\Presenters\Sistema\UsuarioPresenter;
use App\Services\Currency;
use App\Services\Jwt\JwtQrEncode;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Authenticatable
{
  use Notifiable;
  use HasFactory;

  protected $table = 'inf_usuario';

  protected $guard = 'usuario';

  const TIPOS = [
    1 => 'perro',
    2 => 'gato',
    3 => 'raton'
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

  public function team(){
    return $this->belongsTo(Team::class,'id_team');
  }

  public function transacciones(){
    return $this->hasMany(Transaccion::class,'id_usuario')->with(['accion','producto'])->orderBy('id', 'desc');
  }

  public function present(){
    return new UsuarioPresenter($this);
  }

  public function get_usuario(){
    return self::TIPOS[$this->tipo_usuario] ?? '';
  }


  public function nombre_completo() {
    return $this->nombre . ' ' . $this->apellido;
  }

  public function myQR() {
    return (new JwtQrEncode($this))->call();
  }

  public function getCredito() {
    return Currency::getConvert($this->credito) ?? 0;
  }
}
