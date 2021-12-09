<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WansolarwindRequest extends FormRequest
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
                'vlanid'        => 'required|unique:wansolarwinds,vlanid,' . $this->id,
                'vprn'          => 'required|numeric|regex:/^[5][0][0][0-9]{6}$/',
                'empresa_id'    => 'required',
            ];
        } else {
            // Create Form
            return [
                //
            ];
        }
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'vprn.required'       => 'El campo "VPRN" es obligatorio.',
            'empresa_id.required'    => 'Debe seleccionar una empresa',
        ];
    }
}
