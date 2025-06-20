<?php

namespace App\Models;

use App\Http\Controllers\DetalleVentaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'stock',
        'proveedor_id',
    ];
    public function proveedor()
    {
        return $this->belongsTo(proveedor::class);
    }
    public function detalle_ventas()
    {
        return $this->hasMany(detalle_venta::class);
    }
}
