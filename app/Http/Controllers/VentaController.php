<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = venta::all();
        return response()->json($ventas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        $validatedData['fecha_venta'] = now()->toDateString(); // Ya que es tipo DATE

        $venta = venta::create($validatedData);

        return response()->json([
            'message' => 'Venta creada exitosamente.',
            'venta' => $venta
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = venta::findOrFail($id);
        return response()->json($venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        $venta = venta::findOrFail($id);
        $venta->update($validatedData);

        return response()->json([
            'message' => 'Venta actualizada exitosamente.',
            'venta' => $venta
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = venta::findOrFail($id);
        $venta->delete();

        return response()->json([
            'message' => 'Venta eliminada exitosamente.'
        ]);
    }
}
