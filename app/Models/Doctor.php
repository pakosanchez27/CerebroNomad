<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'sexo',
        'email',
        'telefono',
        'especialidad',
        'cedula',
        'nombre_clinica',
        
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
