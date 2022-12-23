<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioRespuestas extends Model
{
    use HasFactory;

    
    public function formularios()
    {
    	return $this->belongsTo(Formularios::class, 'id_formulario');
    }

    public function reglas_formularios()
    {
    	return $this->hasOne(ReglasFormulario::class, 'id_formulario');
    }
}
