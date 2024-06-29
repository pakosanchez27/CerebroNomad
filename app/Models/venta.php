<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_venta',
        'patient_id',
        'vendor_id',
        'id_doctor',
        'fecha_venta',
        'lugar_toma',
        'total',
        'metodo_pago',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

   
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function proceso_muestras()
    {
        // uno a uno
        return $this->hasOne(proceso_muestras::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }


    

}
