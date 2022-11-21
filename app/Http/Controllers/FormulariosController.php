<?php

namespace App\Http\Controllers;

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
        $forms = FormularioRespuestas::paginate();

        return view('municipio.form', compact('forms'));
    }    
}
