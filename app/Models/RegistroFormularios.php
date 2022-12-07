<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroFormularios extends Model
{
    use HasFactory;
    
    public function municipalidad()
    {
    	return $this->belongsTo(Municipalidades::class, 'id_municipalidad');
    }

    public function convocatorias()
    {
    	return $this->belongsTo(Convocatorias::class, 'id_convocatoria');
    }

    public function estados()
    {
    	return $this->belongsTo(Estados::class, 'id_estado');
    }
}
