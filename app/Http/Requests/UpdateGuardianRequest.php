<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuardianRequest extends FormRequest
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
        
        if ($method === 'PUT') {
            return [
                'name' => ['required', 'string', 'max:255'],
                'apellido_paterno' => ['required', 'string', 'max:255'],
                'apellido_materno' => ['required', 'string', 'max:255'],
                'edad' => ['required', 'max:3'],
                'email' => ['required', 'email'],
                'telefono' => ['required', 'string', 'max:10'],
                'parentesco' => ['required', 'string', 'max:255'],
                'patient_id' => ['required', 'integer']
            ];
        } else {
            return [
                'name' => ['sometimes', 'string', 'max:255'],
                'apellido_paterno' => ['sometimes', 'string', 'max:255'],
                'apellido_materno' => ['sometimes', 'string', 'max:255'],
                'edad' => ['sometimes', 'max:3'],
                'email' => ['sometimes', 'email'],
                'telefono' => ['sometimes', 'string', 'max:10'],
                'parentesco' => ['sometimes', 'string', 'max:255'],
                'patient_id' => ['sometimes', 'integer']
            ];
        }
    }
}
