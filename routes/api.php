<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Autenticación pública
Route::post('registrar', [AuthController::class, 'registrar']);
Route::post('login', [AuthController::class, 'login']);

// Grupo de rutas protegidas
Route::middleware(['jwt.auth', 'jwt.role:user'])->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    // Recursos protegidos
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('proveedores', ProveedorController::class);
    Route::apiResource('productos', ProductoController::class);
    Route::apiResource('ventas', VentaController::class);
    Route::apiResource('detalle_ventas', DetalleVentaController::class);
});
