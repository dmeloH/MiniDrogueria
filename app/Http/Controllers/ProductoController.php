<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cantidad' => 'required|integer|min:1',
            'proveedor_id' => 'required|exists:proveedores,id',
        ]);

        $producto = producto::create($validatedData);

        return response()->json([
            'message' => 'Producto creado exitosamente.',
            'producto' => $producto
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = producto::findOrFail($id);
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cantidad' => 'required|integer|min:1',
            'proveedor_id' => 'required|exists:proveedores,id',
        ]);

        $producto = producto::findOrFail($id);
        $producto->update($validatedData);

        return response()->json([
            'message' => 'Producto actualizado exitosamente.',
            'producto' => $producto
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = producto::findOrFail($id);
        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente.'
        ]);
    }
}
