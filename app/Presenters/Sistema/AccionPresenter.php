<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class AccionPresenter extends Presenter
{
  private $folderImg = 'gp_images/accion';
  // private $imgFondo = "/dist/img/international.jpg";
  // private $imgFondoLogin = "/dist/img/international.jpg";
  private $imgLogo = "images/acciones.png";

  public function getImagen() {
    return (new Imagen($this->model->assets['img'] ?? null, $this->folderImg, $this->imgLogo))->call();
  }
}
