<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordens'; // Especificamos la tabla por si acaso
    protected $fillable = ['mesa', 'cliente', 'total', 'estatus', 'nota_general'];

    // Relación: Una orden tiene muchos detalles
    public function detalles() {
        return $this->hasMany(OrdenDetalle::class);
    }
}
