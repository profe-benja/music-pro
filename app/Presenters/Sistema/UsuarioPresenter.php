<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class UsuarioPresenter extends Presenter
{
  private $folderImg = 'photo_usuarios';
  private $imgDefault = "/dist/img/img-default-user.jpg";

  public function getPhoto(){
    return (new Imagen($this->model->foto, $this->folderImg, $this->imgDefault))->call();
  }

  public function nombre_completo(){
		return "{$this->model->nombre} {$this->model->apellido}";
  }
}
