<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'telefono',
        'zona',

    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
