<?php

namespace App\Http\Controllers;

use App\Models\Inf\Config;
use App\Models\Inf\Sistema;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
  public function index() {
    $s = Sistema::first();

    return view('config.sistema', compact('s'));
  }

  public function update(Request $request) {

    $s = Sistema::first();
    $s->nombre = $request->input('nombre');
    $s->descripcion = $request->input('descripcion');

    $assets = $s->assets;

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = time() . 'logo';
      $folder = 'public/gp_images/config';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $assets['logo'] = $img;
      }
    }

    if(!empty($request->file('image2'))){
      $request->validate([
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = time() . 'background';
      $folder = 'public/gp_images/config';
      $img = ImportImage::save($request, 'image2', $filename, $folder);

      if ($img != 400) {
        $assets['background'] = $img;
      }
    }

    $info = $s->info;
    $info['login_title'] = $request->input('login_title');

    $s->assets = $assets;
    $s->info = $info;

    $s->update();

    session(['gp_sistema' => $s]);

    return back()->with('success','Se ha actualizado correctamente.');
  }

  public function demo(Request $request) {
    $s = Sistema::first();

    $info = $s->info;
    $info['redirect_url'] = $request->input('redirect_url');
    $info['demo'] = $request->input('demo') == 1 ? true : false;

    $s->info = $info;
    $s->update();

    session(['gp_sistema' => $s]);

    return back()->with('success','Se ha actualizado correctamente.');
  }
}
