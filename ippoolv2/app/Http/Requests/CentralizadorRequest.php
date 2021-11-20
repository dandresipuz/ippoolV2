<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentralizadorRequest extends FormRequest
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
                'apellido'      => 'required',
                'tipo_doc'      => 'required',
                'documento'     => 'required|unique:centralizadors,documento,' . $this->id,
                'email'         => 'required|email|unique:centralizadors,email,' . $this->id,
                'telefono'      => 'required|numeric|regex:/^[3][0-3][0-9]{8}$/',
                'active'        => 'required',
            ];
        } else {
            // Create Form
            return [
                'nombre'        => 'required',
                'apellido'      => 'required',
                'tipo_doc'      => 'required',
                'documento'     => 'required|unique:centralizadors',
                'email'         => 'required|email|unique:centralizadors',
                'telefono'      => 'required|numeric|regex:/^[3][0-3][0-9]{8}$/',
            ];
        }
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'nombre.required'        => 'El campo "Nombre" es obligatorio.',
            'apellido.required'      => 'El campo "Apellido" es obligatorio.',
            'tipo_doc.required'      => 'Debe seleccionar un tipo de documento',
            'documento.required'     => 'El campo "Documento" es obligatorio.',
            'email.required'         => 'El campo "Email" es obligatorio.',
            'telefono.required'      => 'El campo "Teléfono" es obligatorio.',
            'active.required'        => 'Debe seleccionar un estado para el centralizador',

        ];
    }
}
