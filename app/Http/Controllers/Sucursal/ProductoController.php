<?php

namespace App\Http\Controllers\Sucursal;

use App\Http\Controllers\Controller;
use App\Models\Sucursal\Producto;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
  public function index() {
    $productos = Producto::get();
    return view('sucursal.producto.index', compact('productos'));
  }

  public function create() {
    return view('sucursal.producto.create');
  }

  public function store(Request $request) {
    $p = new Producto();
    $p->codigo = $request->input('codigo');
    $p->nombre = $request->input('nombre');
    $p->descripcion = $request->input('descripcion');
    $p->precio = $request->input('credito') ?? 0;

    $p->stock_ilimitado = !empty($request->input('cant_stock_swith'));
    $p->stock = $request->input('stock') ?? 0;

    $p->estado = $request->input('estado');
    $p->id_usuario = current_store_user()->id;

    $assets = $p->assets;

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
      ]);

      $filename = time() . 'producto';
      $folder = 'public/sucursal/img/articles';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $assets['img'] = $img;
      }
    }
    $p->assets = $assets;
    $p->save();

    // return (new CategoriaProductoBuildServices($p->id,$request->categorias))->call();


    return redirect()->route('sucursal.producto.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $p = Producto::findOrFail($id);
    return view('sucursal.producto.show', compact('p'));
  }

  public function edit($id) {
    $p = Producto::findOrFail($id);
    return view('sucursal.producto.edit', compact('p'));
  }

  public function update(Request $request, $id) {
    $p = Producto::findOrFail($id);
    $p->nombre = $request->input('nombre');
    $p->descripcion = $request->input('descripcion');
    $p->precio = $request->input('credito');

    $p->stock_ilimitado = !empty($request->input('cant_stock_swith'));
    $p->stock = $request->input('stock') ?? 0;

    $p->estado = $request->input('estado');

    $assets = $p->assets;
    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
      ]);

      $filename = time() . 'producto';
      $folder = 'public/sucursal/img/articles';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $assets['img'] = $img;
      }
    }

    $p->assets = $assets;
    $p->update();

    return back()->with('success','Se ha actualizado');
  }
}
