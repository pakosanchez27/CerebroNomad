<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'paterno' => $this->apellido_paterno,
            'materno' => $this->apellido_materno,
            'sexo' => $this->sexo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'identificacion' => $this->num_identificacion,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'tipo_sangre' => $this->tipo_sangre,
            'descripcion' => $this->descripcion_medica,
            'doctor' => $this->doctor,
            'insurance' => $this->insurance,
            'address' => $this->address,
            'guardian' => $this->guardian,
        ];


    }
}
