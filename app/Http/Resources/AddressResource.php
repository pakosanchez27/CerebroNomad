<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'calle' => $this->calle,
            'numero' => $this->numero,
            'colonia' => $this->colonia,
            'codigo_postal' => $this->codigo_postal,
            'municipio' => $this->municipio,
            'estado' => $this->estado,
            'pais' => $this->pais,
            'patient_id' => $this->patient_id,
        ];
    }
}
