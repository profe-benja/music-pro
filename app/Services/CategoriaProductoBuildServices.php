<?php

namespace App\Services;

use App\Models\De\Categoria;
use App\Models\De\ProductoCategoria;

class CategoriaProductoBuildServices
{
  public $tr;
  public $type;
  public $idp;
  public $categorias;
  public $mis_categoria;

  public function __construct($idp, $mis_categoria, $type = 'NEW'){
    // $this->tr = (new TagsResult($my_arreglo, $new_arreglo));
    $this->mis_categoria = $mis_categoria;
    $this->categorias = Categoria::get();
    $this->type = $type;
    $this->idp = $idp;
  }

  public function call() {
    if ($this->type == 'NEW') {
    //   $categorias = Categoria::get()->pluck('id');
    //   $tr = (new TagsResult($categorias, $new_arreglo));
      return $this->new();
    }


    return $this->update();
  }

  private function new() {

    $encontradas = Categoria::whereIn('nombre',$this->mis_categoria)->get();
    $encontradas_nombres = $encontradas->pluck('nombre')->toArray() ?? [];

    $tr = (new TagsResult($encontradas_nombres, $this->mis_categoria));

    foreach ($tr->new() as $keyTr => $valueTr) {
      $c = new Categoria();
      $c->nombre = $valueTr;
      $c->save();

      $pc = new ProductoCategoria();
      $pc->id_producto = $this->idp;
      $pc->id_categoria = $c->id;
      $pc->save();
    }

    foreach ($encontradas as $en) {
      $pc = new ProductoCategoria();
      $pc->id_producto = $this->idp;
      $pc->id_categoria = $en->id;
      $pc->save();
    }
  }

  private function update() {
    $new_categoria = $this->mis_categoria;
    $actual_categoria = ProductoCategoria::where('id_producto', $this->idp)->get();

    $encontradas = Categoria::whereIn('nombre',$this->mis_categoria)->get();
    $encontradas_nombres = $encontradas->pluck('nombre')->toArray() ?? [];

    $tr = (new TagsResult($encontradas_nombres, $this->mis_categoria));
  }
}
