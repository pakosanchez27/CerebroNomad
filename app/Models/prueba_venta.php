<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prueba_venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'prueba_id',
        'cantidad',
        'precio',
        'subtotal',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function prueba()
    {
        return $this->belongsTo(Test::class);
    }

    
}
