<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proceso_muetras extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'fecha_toma_muestra',
        'fecha_envio_lab',
        'fecha_resultado',
        'estado',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    
}
