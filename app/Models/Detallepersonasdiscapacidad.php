<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepersonasdiscapacidad extends Model
{
    use HasFactory;

    protected $table = 'detallepersonasdiscapacidads';
    
    protected $fillable = [
        'id_registro',
        'rut',
        'id_estamento',
        'id_calidad_contractual',
        'id_jornada_laboral',
        'monto_remuneracion_imponible',
        'id_verificador_cumplimiento',
        'genero',
        'fecha_ingreso_institucion',
        'periodo_contratacion_desde',
        'periodo_contratacion_hasta',
    ];
    
}
