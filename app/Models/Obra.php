<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'nombre',
        'clave',
        'objeto',
        'direccion',
        'latitud',
        'longitud',
        'galeria_imagenes',
    ];

    protected $casts = [
        'galeria_imagenes' => 'array',
    ];

    public function incidentes()
    {
        return $this->belongsToMany(Incidente::class, 'obra_incidente');
    }

}