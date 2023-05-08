<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportImageBase64
{
  public static function save(Request $request, $inputName = 'image' ,$name = '', $folderSave = 'public/trash'){
    try {
      // $request->validate([
      //   $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      // ]);

      $image_64 = $request->input($inputName);

      $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

      $replace = substr($image_64, 0, strpos($image_64, ',')+1);

      // find substring fro replace here eg: data:image/png;base64,

      $image = str_replace($replace, '', $image_64);

      $image = str_replace(' ', '+', $image);

      $imageName = $name  .'.'.$extension;

      Storage::disk('public')->put($imageName, base64_decode($image));

      return $imageName;

    } catch (\Throwable $th) {
      return $th;
    }
  }
}
