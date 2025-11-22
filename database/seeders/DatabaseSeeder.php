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
        // 1. CREAR USUARIOS (Para Login)
        User::create([
            'name' => 'Gerente General',
            'email' => 'admin@kds.com',
            'password' => Hash::make('admin123'), // Password encriptado
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jefe de Cocina',
            'email' => 'cocina@kds.com',
            'password' => Hash::make('cocina123'),
            'role' => 'staff',
        ]);

        // 2. CREAR CATEGORÍAS
        $catPlatos = Categoria::create(['nombre' => 'Platos Fuertes', 'icono' => 'bi-egg-fried']);
        $catBebidas = Categoria::create(['nombre' => 'Bebidas', 'icono' => 'bi-cup-straw']);
        $catPostres = Categoria::create(['nombre' => 'Postres', 'icono' => 'bi-cake']);

        // 3. CREAR PLATILLOS DE PRUEBA
        
        Platillo::create([
            'nombre' => 'Hamburguesa Clásica',
            'precio' => 120.00,
            'descripcion' => 'Carne de res 150g, queso cheddar, lechuga y tomate.',
            'imagen' => 'assets/img/portfolio/product-1.jpg',
            'categoria_id' => $catPlatos->id
        ]);

        Platillo::create([
            'nombre' => 'Orden de Tacos',
            'precio' => 85.00,
            'descripcion' => '5 tacos de pastor con piña, cilantro y cebolla.',
            'imagen' => 'assets/img/portfolio/product-2.jpg',
            'categoria_id' => $catPlatos->id
        ]);

        Platillo::create([
            'nombre' => 'Malteada Fresa',
            'precio' => 60.00,
            'descripcion' => 'Helado de fresa natural con leche y crema batida.',
            'imagen' => 'assets/img/portfolio/product-3.jpg',
            'categoria_id' => $catBebidas->id
        ]);
    }
}