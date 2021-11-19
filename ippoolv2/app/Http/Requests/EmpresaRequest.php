<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
                'empresa'       => 'required',
                'tipo_doc'      => 'required',
                'documento'     => 'required|numeric|unique:empresas,documento,' . $this->id,
                'segmento'      => 'required',
                'active'        => 'required',
                'usuario_id'    => 'required',
            ];
        } else {
            // Create Form
            return [
                'empresa'       => 'required',
                'tipo_doc'      => 'required',
                'documento'     => 'required|numeric|unique:empresas',
                'segmento'      => 'required',
                'usuario_id'    => 'required',
            ];
        }
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'empresa.required'       => 'El campo "Empresa" es obligatorio.',
            'tipo_doc.required'      => 'El campo "Tipo de documento" es obligatorio.',
            'documento.required'     => 'El campo "Documento" es obligatorio.',
            'segmento.required'      => 'El campo "Segmento" es obligatorio.',
            'active.required'        => 'El campo "Estado" es obligatorio.',
        ];
    }
}
