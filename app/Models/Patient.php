<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'sexo',
        'fecha_nacimiento',
        'num_identificacion',
        'email',
        'telefono',
        'tipo_sangre',
        'descripcion_medica',
        'doctor_id',
        'insurance_id',
    ];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

}
