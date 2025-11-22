<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Platillo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. USUARIOS
        User::create([
            'name' => 'Gerente General',
            'email' => 'admin@kds.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jefe Cocina',
            'email' => 'cocina@kds.com',
            'password' => Hash::make('cocina123'),
            'role' => 'staff',
        ]);

        // 2. CATEGORÍAS
        $cat1 = Categoria::create(['nombre' => 'Platos Fuertes', 'icono' => 'bi-egg-fried']);
        $cat2 = Categoria::create(['nombre' => 'Bebidas', 'icono' => 'bi-cup-straw']);

        // 3. PLATILLOS
        Platillo::create([
            'nombre' => 'Hamburguesa Clásica',
            'precio' => 120.00,
            'descripcion' => 'Carne de res 150g con queso.',
            'categoria_id' => $cat1->id
        ]);

        Platillo::create([
            'nombre' => 'Tacos al Pastor',
            'precio' => 85.00,
            'descripcion' => 'Orden de 5 tacos con todo.',
            'categoria_id' => $cat1->id
        ]);

        Platillo::create([
            'nombre' => 'Malteada Fresa',
            'precio' => 60.00,
            'descripcion' => 'Helado natural y leche.',
            'categoria_id' => $cat2->id
        ]);
    }
}