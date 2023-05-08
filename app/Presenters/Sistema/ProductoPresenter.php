<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class ProductoPresenter extends Presenter
{
  private $folderImg = 'gp_images/articles';
  private $imgLogo = "images/producto.png";

  public function getImagen() {
    return (new Imagen($this->model->assets['img'] ?? null, $this->folderImg, $this->imgLogo))->call();
  }
}
