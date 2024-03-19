<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecuperaRequest extends FormRequest
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
            //'email'=> 'required|email|between:6,50|exists:users',
            'cedula'=> 'required|exists:users,cedula',
            'password' => 'required|between:6,15|confirmed',
            //regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_.]).{6,}$/

        ];
    }

    public function messages()
    {
        return [

                //'password.regex' => 'Su contraseña debe tener entre 4 y 10 caracteres y contener al menos una letra mayúscula, al menos una letra minúscula,
                 //al menos un valor numérico y al menos un caracter especial, P.E.: #?!@$%^&*-_.',
                'cedula.exists' => '¡Cedula no registrada en el sistema!. Por favor intente de nuevo',
                //'email.exists' => '¡Correo  no registrado en el sistema!. Por favor intente de nuevo ',
                'password.between' => 'Es requerida la validacion',
                //'email.required' => 'Es requerida la validacion',
                'cedula.required' => 'Es requerida la validacion',
        ];
    }
}
