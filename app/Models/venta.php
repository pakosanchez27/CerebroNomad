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

    
}
