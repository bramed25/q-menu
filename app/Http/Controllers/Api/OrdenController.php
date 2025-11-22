<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\OrdenDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importante para transacciones

class OrdenController extends Controller
{
    // RECIBIR PEDIDO DEL CLIENTE (POST)
    public function store(Request $request)
    {
        // Validar datos básicos
        $request->validate([
            'mesa' => 'required|string',
            'total' => 'required|numeric',
            'detalles' => 'required|array' // La lista de productos
        ]);

        try {
            // Usamos DB::transaction para asegurar que se guarde TODO o NADA
            $orden = DB::transaction(function () use ($request) {
                
                // 1. Crear la Orden (Cabecera)
                $orden = Orden::create([
                    'mesa' => $request->mesa,
                    'total' => $request->total,
                    'estatus' => 'pendiente',
                    'nota_general' => $request->nota_general ?? null,
                ]);

                // 2. Crear los Detalles (Productos)
                foreach ($request->detalles as $item) {
                    OrdenDetalle::create([
                        'orden_id' => $orden->id,
                        'platillo_id' => $item['id'], // Asegúrate que JS envíe el ID
                        'cantidad' => $item['cantidad'],
                        'precio' => $item['precio'],
                        'notas' => $item['notas'] ?? null,
                    ]);
                }

                return $orden;
            });

            return response()->json([
                'success' => true,
                'message' => 'Orden enviada a cocina',
                'orden_id' => $orden->id
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error al procesar orden: ' . $e->getMessage()
            ], 500);
        }
    }
}