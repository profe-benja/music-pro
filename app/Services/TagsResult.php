<?php

namespace App\Services;

class TagsResult
{
  public $my;
  public $new;

  public function __construct($my_arreglo, $new_arreglo){
    $this->my = $my_arreglo;
    $this->new = $new_arreglo;
  }

  // return arreglo datos que coinciden entre los dos
  public function intersect() {
    return array_intersect($this->my,$this->new) ?? array();
  }

  // return los que no van a estar en la lista
  public function remove() {
    return array_diff($this->my,$this->new) ?? array();
  }

  // return nuevos datos al arreglo
  public function new() {
    return array_diff($this->new,$this->my) ?? array();
  }
}
