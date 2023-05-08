<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'correo' => 'required|unique:gp_usuario,correo|max:255',
          'nombre' => 'required|max:255',
          'apellido' => 'required|max:255',
          'team' => 'nullable|exists:gp_team,id',
        ];
    }
}
