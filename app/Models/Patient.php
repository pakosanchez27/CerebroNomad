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
        'tipo_identificacion', 
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
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }
    
    public function guardian()
    {
        return $this->belongsTo(Patient::class, 'guardian_id'); // Asumiendo que 'guardian_id' es la clave foránea correcta para el guardián del paciente
    }
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    
    public function address()
    {
        return $this->hasOne(Address::class); // Asumiendo que la relación se establece correctamente en el modelo Address
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    
}
