<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    public function venta()
    {
        return $this->belongsTo(venta::class);
    }

    public function producto()
    {
        return $this->belongsTo(producto::class);
    }
}
