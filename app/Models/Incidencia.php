<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_incidente',
        'descripcion',
        'fecha_incidente',
    ];

    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'obra_incidente');
    }


}
