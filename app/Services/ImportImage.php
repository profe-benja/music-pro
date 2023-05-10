<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportImage
{

  public static function save(Request $request, $inputName = 'image' ,$name = '', $folderSave = 'public/trash', $validate = false, $folderDate = false){
    try {
      if ($validate) {
        $request->validate([
          $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
        ]);
      }

      $nFile = '';
      if ($folderDate) {
        $folderSave .= '/' . date('Y') . '/' . date('m');
        $nFile = date('Y') . '/' . date('m') . '/';
      }

      // Crear las carpetas si no existen
      Storage::makeDirectory($folderSave);

      $file = $request->file($inputName);
      $filename = $name .'.'. $file->getClientOriginalExtension();
      $file->storeAs($folderSave,$filename);
      return $nFile.$filename;
    } catch (\Throwable $th) {
      return $th;
    }
  }


  public static function save_name(
      Request $request,
      $inputName = 'image',
      $name = '',
      $folderSave = 'trash',
      $validate = false)
    {
      try {
        if ($validate) {
          $request->validate([
            $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
          ]);
        }

        $root = 'public/'.$folderSave;
        $file = $request->file($inputName);
        $filename = $name .'.'. $file->getClientOriginalExtension();
        $file->storeAs($root, $filename);

        return $folderSave.'/'.$filename;
      } catch (\Throwable $th) {
        return 400;
      }
  }


  public function saveDisk(Request $request, $inputName = 'image'){
    $path = Storage::disk('public')->put('image',$request->file($inputName));
    return asset($path);
  }
}
