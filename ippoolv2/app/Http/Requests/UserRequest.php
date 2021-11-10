<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            // Edit Form
            return [
                'nombre'        => 'required',
                'apellido'      => 'required|',
                'telefono'      => 'required|numeric|regex:/^[3][0-3][0-9]{8}$/',
                'login'         => 'required|unique:users,login,' . $this->id,
                'email'         => 'required|email|unique:users,email,' . $this->id,
                'perfil'        => 'required',
                'active'        => 'required',
                'empresa_id'    => 'required',
                'area_id'       => 'required',
            ];
        } else {
            // Create Form
            return [
                'nombre'        => 'required',
                'apellido'      => 'required',
                'telefono'      => 'required|numeric|regex:/^[3][0-3][0-9]{8}$/',
                'login'         => 'required|unique:users',
                'email'         => 'required|email|unique:users',
                'password'      => 'required|min:8|regex:/(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/|confirmed',
                'perfil'        => 'required',
                'empresa_id'    => 'required',
                'area_id'       => 'required',
            ];
        }
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'nombre.required'        => 'El campo "Nombre" es obligatorio.',
            'apellido.required'      => 'El campo "Apellido" es obligatorio.',
            'telefono.required'      => 'El campo "Teléfono" es obligatorio.',
            'login.required'         => 'El campo "Login" es obligatorio.',
            'email.required'         => 'El campo "Email" es obligatorio.',
            'perfil.required'        => 'Debe seleccionar un perfil',
            'empresa_id.required'    => 'Debe seleccionar una empresa',
            'area_id.required'       => 'Debe seleccionar un area',
        ];
    }
}
