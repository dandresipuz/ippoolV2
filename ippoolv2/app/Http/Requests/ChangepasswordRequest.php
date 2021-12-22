<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangepasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'oldpassword'   => 'required',
            'password'      => 'required|min:8|max:16|regex:/(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/|confirmed',
        ];
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'oldpassword.required'   => 'El campo "Contraseña antigua" es obligatorio.',
            'password.required'      => 'El campo "Contraseña nueva" es obligatorio.',
            'password.confirmed'     => 'Las contraseñas no coinciden',
            'password.min'           => 'La contraseña debe tener mínimo 8 caracteres',
            'password.max'           => 'La contraseña debe tener maximo 16 caracteres',
        ];
    }
}
