<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Importamos los controladores
use App\Http\Controllers\Api\PlatilloController;
use App\Http\Controllers\Api\OrdenController;
use App\Http\Controllers\Api\LoginController; // <--- Este lo crearemos en el siguiente paso

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Sin Candado)
|--------------------------------------------------------------------------
| Cualquiera puede entrar aquí sin token.
*/

// 1. Autenticación (La Taquilla)
Route::post('/login', [LoginController::class, 'login']); 

// 2. Menú y Pedidos (El Cliente no se loguea)
Route::get('/menu', [PlatilloController::class, 'index']); 
Route::post('/ordenar', [OrdenController::class, 'store']);


/*
|--------------------------------------------------------------------------
| RUTAS PRIVADAS (Con Candado Sanctum)
|--------------------------------------------------------------------------
| Solo usuarios con Token válido pueden entrar aquí.
*/
Route::middleware('auth:sanctum')->group(function () {
    
    // Ver quién soy
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Cerrar Sesión (Romper el boleto)
    Route::post('/logout', [LoginController::class, 'logout']);

    // Gestión del Menú (Solo para el Gerente)
    Route::post('/platillos', [PlatilloController::class, 'store']);
    Route::put('/platillos/{id}', [PlatilloController::class, 'update']);
    Route::delete('/platillos/{id}', [PlatilloController::class, 'destroy']);
    
    // Aquí agregaríamos rutas para ver las órdenes en el dashboard...
});