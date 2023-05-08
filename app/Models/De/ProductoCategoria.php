<?php

namespace App\Models\De;

use App\Presenters\Sistema\ProductoPresenter;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class ProductoCategoria extends Model
{
  use HasFactory;

  protected $table = 'de_producto_categoria';

}
