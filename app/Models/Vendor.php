<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendors'; // especifica el nombre de la tabla
    protected $fillable = [
        'id_usuario',
        'telefono',
        'zona',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
