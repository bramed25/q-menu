<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Platillo;
use App\Http\Resources\PlatilloResource;
use App\Http\Requests\StorePlatilloRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePlatilloRequest;

class PlatilloController extends Controller
{
    // 1. VER MENÚ (GET /api/platillos)
    public function index()
    {
        // Trae los platillos activos e incluye la información de su categoría
        $platillos = Platillo::with('categoria')->where('activo', true)->get();
        
        // Devuelve la lista formateada
        return PlatilloResource::collection($platillos);
    }

    // 2. CREAR PLATILLO (POST /api/platillos)
    public function store(StorePlatilloRequest $request)
    {
        // Si llega aquí, es que ya pasó la validación del Request
        $platillo = Platillo::create($request->validated());

        return response()->json([
            'message' => 'Platillo creado exitosamente',
            'data' => new PlatilloResource($platillo)
        ], 201);
    }

    // 3. VER UN SOLO PLATILLO (GET /api/platillos/{id})
    public function show($id)
    {
        $platillo = Platillo::findOrFail($id);
        return new PlatilloResource($platillo);
    }

    // 4. BORRAR PLATILLO (DELETE /api/platillos/{id})
    public function destroy($id)
    {
        $platillo = Platillo::findOrFail($id);
        // No lo borramos de verdad, solo lo desactivamos para no romper el historial de ventas
        $platillo->activo = false;
        $platillo->save();

        return response()->json(['message' => 'Platillo eliminado del menú']);
    }
    // 5. ACTUALIZAR (PUT /api/platillos/{id})
    public function update(UpdatePlatilloRequest $request, $id)
    {
        $platillo = Platillo::findOrFail($id);
        
        // Actualizamos solo los campos que enviaron
        $platillo->update($request->validated());

        return response()->json([
            'message' => 'Platillo actualizado correctamente',
            'data' => new PlatilloResource($platillo)
        ]);
    }
}