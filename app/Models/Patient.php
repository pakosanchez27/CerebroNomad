<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
     
    ];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function guardian()
    {
        return $this->belongsTo(guardian::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

}
