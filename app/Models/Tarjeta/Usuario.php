<?php

namespace App\Models\Tarjeta;

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

  protected $table = 'tarjeta_usuario';

  protected $guard = 'card_usuario';

  const TIPOS = [
    1 => 'a',
    2 => 'b',
    3 => 'c'
  ];

  protected function integrations(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

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

  public function tarjetas(){
		return $this->hasMany(Tarjeta::class, 'id_usuario');
	}

  public function me_card() {
    return $this->tarjetas()->first();
  }

  public function generateSecretKey() {
    return substr(time(), 1,5) . substr($this->username,1,6);
  }

  public function getIntegrationCompany() {
    return $this->integrations['company'] ?? '';
  }

  public function getIntegrationUser() {
    return $this->integrations['user'] ?? '';
  }

  public function getSecretKey() {
    $secret = $this->integrations['secret_key'] ?? null;

    if (empty($secret)) {
      $secret = $this->generateSecretKey();

      $integrations = $this->integrations;
      $integrations['secret_key'] = $secret;
      $this->integrations = $integrations;

      $this->update();
    }

    return $secret;
  }

  public function getCredito() {
    return Currency::getConvert($this->credito) ?? 0;
  }
}
