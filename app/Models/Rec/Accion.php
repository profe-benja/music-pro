<?php

namespace App\Models\Rec;

use App\Presenters\Sistema\AccionPresenter;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Accion extends Model
{
  use HasFactory;

  protected $table = 'rec_accion';

  // CONST STATUS = [
  //   1 => 'SIN SOLICITUD',
  //   2 => 'CON SOLICITUD',
  //   3 => 'FINALIZADOS'
  // ];
  protected function assets(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  protected function config(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  public function present(){
    return new AccionPresenter($this);
  }

  public function getCredito() {
    return Currency::getConvert($this->credito) ?? 0;
  }
}
