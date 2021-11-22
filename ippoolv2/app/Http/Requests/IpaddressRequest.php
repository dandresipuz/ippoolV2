<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IpaddressRequest extends FormRequest
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
                'ipaddress'     => 'required|unique:ipaddresses,ipaddress,' . $this->id,
                'service'       => 'required',
                'idservice'     => 'required|unique:ipaddresses,idservice,' . $this->id,
                'empresa_id'    => 'required',
            ];
        } else {
            // Create Form
            return [
                // 'ipaddress'     => 'required|ipv4|unique:ipaddresses',
                'ipaddress'     => 'required|unique:ipaddresses',
                'service'       => 'required',
                'idservice'     => 'required|unique:ipaddresses',
                'empresa_id'    => 'required',
            ];
        }
    }
    public function messages()
    { //Se personalizan los mensajes para cada campo requerido
        return [
            'ipaddress.required'     => 'El campo "Dirección IP" es obligatorio.',
            'service.required'       => 'Debe seleccionar un tipo de servicio',
            'idservice.required'     => 'El campo "Identificador de servicio" es obligatorio.',
            'empresa_id.required'    => 'Debe seleccionar una empresa',
        ];
    }
}
