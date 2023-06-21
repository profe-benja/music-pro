<?php

namespace App\Http\Controllers\Tarjeta\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta\Banco;
use App\Models\Tarjeta\Usuario;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class BancoController extends Controller
{
  public function index() {

    $bancos = Banco::get();

    return view('tarjeta.admin.banco.index', compact('bancos'));
  }

  public function create() {
    return view('tarjeta.admin.banco.create');
  }

  public function store(Request $request) {
    $b = new Banco();
    $b->nombre = $request->input('nombre');
    $b->token =  substr(trim($request->input('nombre')), 0, 3) . '-' . substr(md5(time()), 0, 5);
    // $b->img = $request->input('nombre');
    $b->url = $request->input('url');
    $b->code = $request->input('code');
    $b->disponible = $request->input('disponible') == 1 ? true : false;


    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . 'bancos';
      $folder = 'public/tarjeta/img/bancos';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $b->img = $img;
      }
    }
    $b->save();

    return redirect()->route('tarjeta.admin.banco.index')->with('success', 'Se ha creado correctamente');
  }

  function show($id) {
    $b = Banco::findOrFail($id);

    return view('tarjeta.admin.banco.edit', compact('b'));
  }

  public function update(Request $request, $id) {
    $b = Banco::findOrFail($id);
    $b->nombre = $request->input('nombre');
    // $b->token =  substr(trim($request->input('nombre')), 0, 3) . '-' . substr(md5(time()), 0, 5);
    // $b->img = $request->input('nombre');
    $b->url = $request->input('url');
    $b->code = $request->input('code');
    $b->disponible = $request->input('disponible') == 1 ? true : false;

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . 'bancos';
      $folder = 'public/tarjeta/img/bancos';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $b->img = $img;
      }
    }
    $b->update();

    return back()->with('success', 'Se ha actualizado');
  }
}
