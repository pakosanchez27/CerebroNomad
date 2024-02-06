<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable = [
      
    ];

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
    
}
