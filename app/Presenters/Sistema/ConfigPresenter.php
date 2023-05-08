<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class ConfigPresenter extends Presenter
{
  private $folderImg = 'gp_images/config';
  // private $imgFondo = "/dist/img/international.jpg";
  // private $imgFondoLogin = "/dist/img/international.jpg";
  private $imgLogo = "images/coin.svg";

  public function getImagenCoin() {
    return (new Imagen($this->model->assets_coin, $this->folderImg, $this->imgLogo))->call();
  }
}
