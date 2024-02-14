<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

       $method = $this->method();
        if($method === 'PUT'){
            return [
               //
            'name' => ['required', 'string', 'max:35'],
            'apellido_paterno' => ['required', 'string', 'max:35'],
            'apellido_materno' => ['required', 'string', 'max:35'],
            'sexo' => ['required', 'string', Rule::in(['Masculino', 'Femenino'])],
            'fecha_nacimiento' => ['required', 'date'],
            'num_identificacion' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'telefono' => ['required', 'string', 'max:10'],
            'tipo_sangre' => ['required', 'string', 'max:3'],
            'descripcion_medica' => ['required', 'string'],
            'doctor_id' => ['required', 'integer'],
            'insurance_id' => ['required', 'integer'],

            ];

        } else{
            return [
                //
                'name' => ['sometimes', 'string', 'max:35'],
                'apellido_paterno' => ['sometimes', 'string', 'max:35'],
                'apellido_materno' => ['sometimes', 'string', 'max:35'],
                'sexo' => ['sometimes', 'string', Rule::in(['Masculino', 'Femenino'])],
                'fecha_nacimiento' => ['sometimes', 'date'],
                'num_identificacion' => ['sometimes', 'string', 'max:20'],
                'email' => ['sometimes', 'string', 'email', 'max:50'],
                'telefono' => ['sometimes', 'string', 'max:10'],
                'tipo_sangre' => ['sometimes', 'string', 'max:3'],
                'descripcion_medica' => ['sometimes', 'string'],
                'doctor_id' => ['sometimes', 'integer'],
                'insurance_id' => ['sometimes', 'integer'],
            ];
        }
        
    }
}
