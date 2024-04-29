<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'vendor_id',
        'prueba_id', // Cambiar 'test_id' por 'prueba_id' si es el nombre correcto de la columna en la tabla 'ventas'
        'fecha_venta',
        'total',
        'metodo_pago',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function proceso_muestras()
    {
        // uno a uno
        return $this->hasOne(proceso_muestras::class);
    }

    

}
