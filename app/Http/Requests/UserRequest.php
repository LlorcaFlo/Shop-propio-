<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [

        'name' => 'required | min:3',
        'user_name' => 'required | min:3',
        'email' => 'required ',
        'password' => 'required | min:8'
        ];
    }

    public function messages()
    {
      return [
         'name.required' => 'El nombre es obligatorio',
         'name.min' => 'El nombre debe tener al menos tres caracteres',
         'user_name.required' => 'El nick de usuario es obligatorio',
         'user_name.min' => 'El nick de usuario debe tener al menos tres caracteres',
         'email.required' => 'El email es obligatorio',
         'password.required' => 'El password es obligatorio',
         'password.min' => 'El password debe ser mínimo de 8 caracteres',
      ];
    }

}
