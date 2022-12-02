<?php

namespace App\Http\Controllers;

use App\Models\Convocatorias;
use App\Models\Etapaproductos;
use App\Models\FormularioOption;
use Illuminate\Http\Request;
use App\Models\FormularioRespuestas;
use App\Models\Formularios;
use App\Models\Municipalidades;
use App\Models\RegistroFormularios;
use PhpParser\Node\Expr\AssignOp\Concat;

class FormulariosController extends Controller
{
    /**
     * Show the application formulario municipalidad.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**Obtener id municipalidad del usuario ROL */
        $idmunicipalidad = 1; 
        $municialidad = Municipalidades::where('id',$idmunicipalidad)->get();
        $registrosForm = RegistroFormularios::where('id_municipalidad',$idmunicipalidad)
                                           ->where('activo',1)
                                           ->with('municipalidad')
                                           ->with('convocatorias')
                                           ->with('estados')
                                           ->paginate();
        
                                           //dd($registrosForm);
        return view('municipio.registrosform', ['registrosForm' => $registrosForm, 'munidata'=>$municialidad] );
    }

    public function formulario_respuesta(Request $request)
    {
        /**Obtener id municipalidad del usuario ROL */
        $idmunicipalidad = 1;
        $munidata = Municipalidades::where('id',$idmunicipalidad)->get();
        $convocatoriaData = Convocatorias::where('id',$request->idconvocatoria)->get();
        $etapasFormulario = Etapaproductos::where('id_producto', env('ID_PROGRAMA') )
        ->orderBy('orden')
        ->get();

        $forms = FormularioRespuestas::where('id_registro',$request->idregistro)
                                    ->with('formularios')
                                    ->get();
       
        $opcionesForm = FormularioOption::with('formulariosOption')->get();
   

        // dd($opcionesForm);
       // dd($forms);
       // dd($etapasFormulario);
       // dd($munidata);
       // dd($convocatoriaData);

        return view('municipio.form', compact(['forms','etapasFormulario','munidata','convocatoriaData','opcionesForm']) );
    }

    public function save()
    {

    }
 
}
