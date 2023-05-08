<?php

namespace App\Http\Controllers;

use App\Models\Inf\Config;
use App\Models\Inf\Sistema;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
  public function index() {
    return view('config.index');
  }

  public function coin() {
    $c = Config::first();

    return view('config.coin', compact('c'));
  }

  public function coinUpdate(Request $request) {
    $c = Config::first();
    $c->nombre = $request->input('nombre') ?? '';
    $c->descripcion = $request->input('descripcion');

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = time();
      $folder = 'public/gp_images/config';
      $img = ImportImage::save($request, 'image', $filename, $folder);

      if ($img != 400) {
        $c->assets_coin = $img;
      }
    }

    $c->update();

    session(['gp_config' => $c]);

    return back()->with('success','Se ha actualizado correctamente.');
  }
}
