<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
            'nro_documento'=> 'required|exists:carga_documentos',

        ];
    }

    public function messages()
    {
        return [

                'nro_documento.exists' => 'Número de Documento no registrado en el sistema!. Por favor intente de nuevo',
                'nro_documento.required' => 'Es requerida la validación',
        ];
    }
}
