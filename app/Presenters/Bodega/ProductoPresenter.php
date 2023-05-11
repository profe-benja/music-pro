<?php

namespace App\Presenters\Bodega;
use App\Presenters\Presenter;
use App\Services\Imagen;

class ProductoPresenter extends Presenter
{
  private $folderImg = 'bodega/img/articles';
  private $imgLogo = "assets/templateproducto.png";

  public function getImagen() {
    return (new Imagen($this->model->assets['img'] ?? null, $this->folderImg, $this->imgLogo))->call();
  }
}
