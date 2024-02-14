<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
        return [
            // Agregar reglas de validación para los campos del modelo Doctor
            'name' => ['required', 'string', 'max:35'],
            'apellido_paterno' => ['required', 'string', 'max:35'],
            'apellido_materno' => ['required', 'string', 'max:35'],
            'sexo' => ['required', 'string', 'in:Masculino,Femenino'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'telefono' => ['required', 'string', 'max:10'],
            'especialidad' => ['required', 'string', 'max:50'],
            'cedula' => ['required', 'string', 'max:20'],
            'nombre_clinica' => ['required', 'string', 'max:50'],

        ];
    }
}
