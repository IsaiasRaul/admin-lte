<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioOption extends Model
{
    use HasFactory;

    public function formulariosOption()
    {
    	return $this->belongsTo(Formularios::class, 'id_formulario');
    }   
}
