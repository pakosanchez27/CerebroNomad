<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'calle' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'colonia' => ['required', 'string', 'max:255'],
            'codigo_postal' => ['required', 'string', 'max:7'],
            'ciudad' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'referencias' => ['required', 'string', 'max:255'],
            'patient_id' => ['required', 'integer'],
        ];
    }
}
