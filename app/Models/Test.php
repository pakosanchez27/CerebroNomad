<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\prueba_venta;

class Test extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price'];

  

    public function prueba_venta(){
        return $this->belongsTo(proceso_muestras::class);
    }
}
