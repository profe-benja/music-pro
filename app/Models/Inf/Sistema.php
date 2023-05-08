<?php

namespace App\Models\Inf;

use App\Presenters\Sistema\ConfigPresenter;
use App\Presenters\Sistema\SistemaPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Sistema extends Model
{
  use HasFactory;

  protected $table = 'inf_sistema';

  protected function integrations(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  protected function assets(): Attribute {
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

  public function present(){
    return new SistemaPresenter($this);
  }

  public function getInfoDemo() {
    return  $this->info['demo'] ?? false;
  }

  public function getInfoLoginTitle() {
    return  $this->info['login_title'] ?? 'Gestión, Rapidez & Stock NOW!';
  }

  public function getInfoRedirectUrl() {
    return  $this->info['redirect_url'] ?? '';
  }
}
