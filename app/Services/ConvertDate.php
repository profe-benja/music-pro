<?php

namespace App\Services;

class ConvertDate
{
  public static function convertDate($strDate) {
    $formato = 'd-m-Y H:i';
    $fecha = \DateTime::createFromFormat($formato, $strDate);
    return $fecha->format('Y-m-d H:i:s');
  }
}
