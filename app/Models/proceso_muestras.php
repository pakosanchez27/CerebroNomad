<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proceso_muestras extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'patient_id',
        'fecha_toma_muestra',
        'fecha_envio_lab',
        'fecha_resultado',
        'prueba_id', 
        'estado',
    ];

    public function venta()
    {
        // uno a uno
        return $this->belongsTo(venta::class);
    }

    public function patient()
    {
        // uno a muchos
        return $this->belongsTo(Patient::class);
    }

    public function test(){
        return $this->belongsTo(Test::class);
    }

    

    
}
