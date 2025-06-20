<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = cliente::all();
        return response()->json($clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|integer|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $cliente = cliente::create($validatedData);

        return response()->json([
            'message' => 'Cliente creado exitosamente.',
            'cliente' => $cliente
        ], 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = cliente::findOrFail($id);
        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
        ]);

        $cliente = cliente::findOrFail($id);
        $cliente->update($validatedData);

        return response()->json([
            'message' => 'Cliente actualizado exitosamente.',
            'cliente' => $cliente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = cliente::findOrFail($id);
        $cliente->delete();

        return response()->json([
            'message' => 'Cliente eliminado exitosamente.'
        ]);
    }
}
