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
        'asistente',
        'telefono_asistente',
        'email_asistente',
        
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    
    // relacion con venta
    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}
