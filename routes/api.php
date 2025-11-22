<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Importamos tus controladores
use App\Http\Controllers\Api\PlatilloController;
use App\Http\Controllers\Api\OrdenController;

// 1. Rutas Públicas (Cualquiera puede verlas)
Route::get('/menu', [PlatilloController::class, 'index']); // Ver el menú
Route::post('/ordenar', [OrdenController::class, 'store']); // Enviar una orden (Carrito)

// 2. Rutas Privadas (Solo Gerente - Futuro)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Aquí pondremos el CRUD de platillos después (Crear, Editar, Borrar)
    Route::post('/platillos', [PlatilloController::class, 'store']);
    Route::delete('/platillos/{id}', [PlatilloController::class, 'destroy']);
});