<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglasFormularioMensaje extends Model
{
    use HasFactory;

    public function reglas_formularios_mensaje()
    {
    	return $this->belongsTo(ReglasFormulario::class, 'id_regla');
    }

}
