<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fecha_venta',  // ← este nombre es el correcto
        'total',
        'empleado',
        'producto_id', // ← solo si lo estás usando
        'cantidad'     // ← igual
    ];


    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    }

    public function detalle_ventas()
    {
        return $this->hasMany(detalle_venta::class);
    }
}
