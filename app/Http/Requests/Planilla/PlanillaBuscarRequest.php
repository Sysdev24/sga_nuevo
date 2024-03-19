<?php
namespace App\Http\Requests\Planilla;

use Illuminate\Foundation\Http\FormRequest;

class PlanillaBuscarRequest extends FormRequest
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
            //
            'entidad' => 'required',
            'oficina' => 'required',
            'capital' => 'required',
            'clasificacion' => 'required',
            'division' => 'required',
            'grupo' => 'required', 
            'clase' => 'required',
            'tipo_empresa' => 'required',
            'objeto' => 'required',
            'cantidad_copias' => 'required',
            //'documento' => 'sometimes|required',
            'documento' => 'required|mimes:pdf',
            'documento_inventario' => 'sometimes|required|mimes:pdf',
            'documento_carta' => 'sometimes|required|mimes:pdf',
        ];
    }
    public function messages()
    {
     return [
         'nombre.required' => 'Campo obligatorio.',
         'nombre.between'  => 'Mínimo 5, máximo 25 caracteres.',
         'cedula.between'  => 'Mínimo 7, máximo 15 caracteres.',
         'cedula.required' => 'Campo obligatorio.',
         'fecha_n.required'     => 'Campo obligatorio.',
         'carnet.required'     => 'Campo obligatorio.',
         'domicilio.required'     => 'Campo obligatorio.',
         'contacto_e.required'     => 'Campo obligatorio.',
         'telefono_c.required'     => 'Campo obligatorio.'
        ];
    }
}
