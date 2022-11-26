<?php

namespace App\Http\Controllers;

use App\Models\Convocatorias;
use App\Models\Etapaproductos;
use Illuminate\Http\Request;
use App\Models\FormularioRespuestas;

class FormulariosController extends Controller
{
    /**
     * Show the application formulario municipalidad.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        //return view('municipio.form', ['forms' => $forms, 'etapasFormulario'=>$etapas] );
    }

    public function formularios()
    {
        $etapas = Etapaproductos::where('id_producto', env('ID_PROGRAMA') )
        ->orderBy('orden')
        ->get();

        $forms = FormularioRespuestas::paginate();

        dd($forms);

        return view('municipio.form', ['forms' => $forms, 'etapasFormulario'=>$etapas] );
    }
     
 
}
