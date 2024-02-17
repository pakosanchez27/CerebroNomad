<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
        }else{
            return [
                'calle' => ['sometimes', 'string', 'max:255'],
                'numero' => ['sometimes', 'string', 'max:255'],
                'colonia' => ['sometimes', 'string', 'max:255'],
                'codigo_postal' => ['sometimes', 'string', 'max:7'],
                'ciudad' => ['sometimes', 'string', 'max:255'],
                'estado' => ['sometimes', 'string', 'max:255'],
                'pais' => ['sometimes', 'string', 'max:255'],
                'referencias' => ['sometimes', 'string', 'max:255'],
                'patient_id' => ['sometimes', 'integer'],
            ];
        }
    }
}
