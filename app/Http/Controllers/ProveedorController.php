<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class proveedorController extends Controller
{
    public function index()
    {
        $proveedores = proveedor::all();
        return response()->json($proveedores);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|nullable|string|max:500',
            'telefono' => 'required|nullable|string|max:20',
            'email' => 'required|nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación.',
                'errors' => $validator->errors()
            ], 422);
        }

        $proveedor = proveedor::create($validator->validated());

        return response()->json([
            'message' => 'Proveedor creado exitosamente.',
            'proveedor' => $proveedor
        ], 201);
    }

    public function show(string $id)
    {
        $proveedor = proveedor::findOrFail($id);
        return response()->json($proveedor);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:500',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación.',
                'errors' => $validator->errors()
            ], 422);
        }

        $proveedor = proveedor::findOrFail($id);
        $proveedor->update($validator->validated());

        return response()->json([
            'message' => 'Proveedor actualizado exitosamente.',
            'proveedor' => $proveedor
        ]);
    }

    public function destroy(string $id)
    {
        $proveedor = proveedor::findOrFail($id);
        $proveedor->delete();

        return response()->json([
            'message' => 'Proveedor eliminado exitosamente.'
        ]);
    }
}
