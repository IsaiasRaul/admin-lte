<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];
}
