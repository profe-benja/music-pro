<?php

namespace App\Http\Controllers;

use App\Models\De\Categoria;
use App\Models\De\Producto;
use App\Models\De\ProductoCategoria;
use App\Services\CategoriaProductoBuildServices;
use App\Services\ImportImage;
use App\Services\TagsResult;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
  public function index() {
    $productos = Producto::get();
    return view('producto.index', compact('productos'));
  }

  public function create() {
    $categorias = Categoria::get();

    return view('producto.create', compact('categorias'));
  }

  public function store(Request $request) {
    $p = new Producto();
    $p->codigo = time() . date('Ymd');
    $p->nombre = $request->input('nombre');
    $p->descripcion = $request->input('descripcion');
    $p->precio = $request->input('credito') ?? 0;

    $p->stock_ilimitado = !empty($request->input('cant_stock_swith'));
    $p->stock = $request->input('stock') ?? 0;

    $p->estado = $request->input('estado');
    $p->id_usuario = current_user()->id;

    $assets = $p->assets;

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . 'rewards';
      $folder = 'public/gp_images/articles';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $assets['img'] = $img;
      }
    }
    $p->assets = $assets;
    $p->save();

    return (new CategoriaProductoBuildServices($p->id,$request->categorias))->call();


    return redirect()->route('admin.producto.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $p = Producto::findOrFail($id);
    return view('producto.show', compact('p'));
  }

  public function edit($id) {
    $p = Producto::findOrFail($id);
    return view('producto.edit', compact('p'));
  }

  public function update(Request $request, $id) {
    $a = Producto::findOrFail($id);
    $a->nombre = $request->input('nombre');
    $a->descripcion = $request->input('descripcion');
    $a->precio = $request->input('credito');

    $a->stock_ilimitado = !empty($request->input('cant_stock_swith'));
    $a->stock = $request->input('stock') ?? 0;

    $a->cant_por_usuario_ilimitado = !empty($request->input('cant_per_user_swith'));
    $a->cant_por_usuario = $request->input('cant_per_user') ?? 0;
    $a->estado = $request->input('estado');

    $assets = $a->assets;
    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . 'rewards';
      $folder = 'public/gp_images/articles';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $assets['img'] = $img;
      }
    }

    $a->assets = $assets;
    $a->update();

    return back()->with('success','Se ha actualizado');
  }
}
