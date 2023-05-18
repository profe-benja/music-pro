<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class BancoPresenter extends Presenter
{
  private $folderImg = 'public/tarjeta/img/bancos';
  private $imgLogo = "images/producto.png";

  public function getImagen() {
    return (new Imagen($this->model->img ?? null, $this->folderImg, $this->imgLogo))->call();
  }
}
