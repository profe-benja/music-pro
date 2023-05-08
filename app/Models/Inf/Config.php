<?php

namespace App\Models\Inf;

use App\Presenters\Sistema\ConfigPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Config extends Model
{
  use HasFactory;

  protected $table = 'inf_config';

  // public $incrementing = false;
  // CONST STATUS = [
  //   1 => 'SIN SOLICITUD',
  //   2 => 'CON SOLICITUD',
  //   3 => 'FINALIZADOS'
  // ];

  // protected function integrations(): Attribute {
  //   return Attribute::make(
  //       get: fn ($value) => json_decode($value, true),
  //       set: fn ($value) => json_encode($value),
  //   );
  // }

  // protected function info(): Attribute {
  //   return Attribute::make(
  //       get: fn ($value) => json_decode($value, true),
  //       set: fn ($value) => json_encode($value),
  //   );
  // }

  public function present(){
    return new ConfigPresenter($this);
  }
}
