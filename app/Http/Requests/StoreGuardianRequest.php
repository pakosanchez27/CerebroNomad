<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuardianRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'edad' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'parentesco' => ['required', 'string', 'max:255'],
            'patient_id' => ['required', 'integer'],
        ];
    }
}
