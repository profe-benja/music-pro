<?php

namespace App\Services\Preload;

use App\Models\Bodega\Producto;
use App\Models\Sucursal\Producto as SucursalProducto;

class ProductoPreload
{
  public function __construct() {

  }

  public function call() {
    try {
      $this->getProductosBodega();
      $this->getProductosSucursal();
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function buildProducto() {
    return [
      ['Guitarra eléctrica','Instrumento de cuerda con amplificación eléctrica'],
      ['Batería Negra','Set de tambores y platillos para tocar ritmos musicales'],
      ['Batería Eléctrica','Batería electrónica con pads y sonidos digitales'],
      ['Batería Eléctrica 3000','Batería electrónica profesional con múltiples funciones y sonidos'],
      ['Set de cuerdas de guitarra','Paquete de cuerdas de repuesto para guitarra'],
      ['Kit Pro de Guitarra','Paquete completo para guitarristas, incluye accesorios y amplificador'],
      ['Kit Pro de Guitarra','Paquete completo para guitarristas, incluye accesorios y amplificador'],
      ['Violín 4/4 Negro','Violín de tamaño completo con acabado negro'],
      ['Violín Eléctrico 4/4','Violín eléctrico con salida de audio para amplificar el sonido'],
      ['Violín Púrpura','Violín de color púrpura con excelente calidad de sonido'],
      ['Ukelele Celeste','Instrumento de cuerda similar a una guitarra pequeña, con tono suave y melodioso'],
      ['Ukelele Clásico + Afinador','Ukelele clásico con afinador incorporado'],
      ['Kit de Uñetas','Conjunto de uñetas o púas para tocar instrumentos de cuerda'],
      ['Cejillo para Guitarra Light Silver JCP-02','Dispositivo para presionar las cuerdas de la guitarra y cambiar  [su tonalidad'],
      ['Afinador de Mango','Afinador de instrumentos de cuerda con formato de pinza para sujetarse al mango'],
      ['Kit de Teclado 55 Teclas','Paquete completo para tecladistas, incluye teclado y accesorios'],
      ['Trompeta Principiante','Trompeta para principiantes, ideal para aprender a tocar este instrumento de viento'],
      ['Kit Micrófono Eléctrico','Conjunto de micrófonos para uso en grabaciones o presentaciones en vivo'],
      ['Parlante Marshall','Parlante amplificador de sonido para instrumentos musicales'],
      ['Congas Profesionales','Instrumentos de percusión de origen afro-cubano'],
      ['Melódica 32 Notas Fussen','Instrumento de viento similar a un teclado, se toca soplando y presionando las teclas'],
      ['Guitarra Acústica','Instrumento de cuerda con caja de resonancia y sin necesidad de amplificación'],
      ['Guitarra Eléctrica Gibson Les Paul','Guitarra eléctrica de alta gama fabricada por Gibson'],
      ['Set de Cuerdas de Guitarra Eléctrica','Paquete de cuerdas de repuesto para guitarra eléctrica'],
      ['Kit de Guitarra Eléctrica','Paquete completo para guitarristas eléctricos, incluye guitarra, amplificador y accesorios'],
      ['Bajo Rojo de 4 Cuerdas','Bajo eléctrico de 4 cuerdas con acabado rojo'],
      ['Kit de Bajo Eléctrico + Parlantes','Paquete completo para bajistas, incluye bajo, amplificador y accesorios'],
      ['Teclado de Principiante','Teclado de 61 teclas para principiantes'],
      ['Teclado Profesional','Teclado de 88 teclas para uso profesional'],
      ['Trompeta Profesional','Trompeta de alta gama para uso profesional'],
      ['Kit de Saxofón Juvenil','Paquete completo para saxofonistas, incluye saxofón y accesorios'],
      ['DJ Editor Musical','Dispositivo para mezclar y editar música'],
      ['DJ Mezcladora Musical','Dispositivo para mezclar música'],
      ['Batería Clásica Roja','Set de tambores y platillos para tocar ritmos musicales'],
      ['Micrófono Profesional','Micrófono de alta gama para uso profesional.'],
      ['DJSTARTER KIT HERCULES DE CONTROLADOR DJ PARA PC','Controlador de DJ para PC con software incluido'],
      ['Pack de audio Focusrite Scarlett 2i2 Studio - 3rd gen','El pack de grabación Focusrite Scarlett 2i2 Studio te brinda una excelente interfaz que incluye todo lo que necesitas para grabar. La tercera generación de Focusrite Scarlett 2i2'],
      ['Cable De Guitarra / Bajo Joyo 4,5m','1. Longitud: 4,5 m, 2. Macho de una sola vía de 6,3mm a 6,3mm
      3. El Cable C.M. Está fabricado con PVC de alta calidad y conductores de cobre puro.'],
      ['Guiro Charrasca Profesional Torpedo Instrumento Musical','1. Material: Acero inoxidable'],
      ['17 Teclas Kalimba, Pulgar, Piano Africano','1. Material: Madera + Metal'],
      ['Metalofono Cromatico 25 Notas Infantil Colores Profesional','Metalófono de 25 teclas de metal con 2 baquetas plásticas. Viene en una caja estilo maletín plástico de color amarillo.
      Ideal para uso escolar, especialmente para aquello que estén comenzando a aprender a tocar este instrumento.
      El metalofono tiene un sonido suave y dulce que puede ir desde graves a agudos con un tintineo inconstante.'],
      ['Pedal de efecto NUX Modeling Guitar Processor MG-300 negro','Este pedal de efectos permite alterar el sonido de tu instrumento y, de esta manera, explorar nuevas posibilidades sonoras. ¡Crea con mayor libertad y disfruta de la música!']
    ];
  }

  public function buildArrayProducto() {
    $array = [];
    $code = 1;
    foreach ($this->buildProducto() as $key => $value) {
      $assets = [
        'img' => asset('assets/productos/' . $code . '.png'),
      ];

      array_push($array, [
        'codigo' => $code . '00' . rand(1, 10000),
        'nombre' => $value[0],
        'descripcion' => $value[1],
        'precio' => rand(10000, 1000000),
        'stock_critico' => rand(1,10),
        'stock' => rand(1,100),
        'assets' => $assets
      ]);
      $code++;
    }

    return $array;
  }

  public function getProductosBodega() {
    foreach ($this->buildArrayProducto() as $key => $value) {
      $p = new Producto();
      $p->codigo = $value['codigo'];
      $p->nombre = $value['nombre'];
      $p->descripcion = $value['descripcion'];
      $p->precio = $value['precio'];
      $p->stock = $value['stock'];
      $p->assets = $value['assets'];
      $p->id_usuario = 1;
      $p->estado = 3;
      $p->save();
    }
  }

  public function getProductosSucursal() {
    foreach ($this->buildArrayProducto() as $key => $value) {
      $p = new SucursalProducto();
      $p->codigo = $value['codigo'];
      $p->nombre = $value['nombre'];
      $p->descripcion = $value['descripcion'];
      $p->precio = $value['precio'];
      $p->stock_critico = $value['stock_critico'];
      $p->stock = $value['stock'];
      $p->assets = $value['assets'];
      $p->id_usuario = 1;
      $p->estado = 3;
      $p->save();
    }
  }
}
