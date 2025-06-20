<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class cliente extends Model
{
   use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }  
}
