<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class proveedor extends Model
{
    use HasFactory;
    // representación de la tabla en la base de datos
    // se especifica el nombre de la tabla para que no haya problemas con las consultas
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
    ];

    public function productos()
    {
        return $this->hasMany(producto::class);
    }
}
