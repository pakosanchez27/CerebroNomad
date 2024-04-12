<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'telefono',
        'zona',
        'password'
    ];
    
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
