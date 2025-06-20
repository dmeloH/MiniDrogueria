<?php

namespace App\Http\Controllers;

use App\Models\detalle_venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalles = detalle_venta::all();
        return response()->json($detalles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        // calcular subtotal
        $validatedData['subtotal'] = $validatedData['cantidad'] * $validatedData['precio_unitario'];

        $detalle = detalle_venta::create($validatedData);

        return response()->json([
            'message' => 'Detalle de venta creado exitosamente.',
            'detalle' => $detalle
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalle = detalle_venta::findOrFail($id);
        return response()->json($detalle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        // recalcular subtotal
        $validatedData['subtotal'] = $validatedData['cantidad'] * $validatedData['precio_unitario'];

        $detalle = detalle_venta::findOrFail($id);
        $detalle->update($validatedData);

        return response()->json([
            'message' => 'Detalle de venta actualizado exitosamente.',
            'detalle' => $detalle
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle = detalle_venta::findOrFail($id);
        $detalle->delete();

        return response()->json([
            'message' => 'Detalle de venta eliminado exitosamente.'
        ]);
    }
}
