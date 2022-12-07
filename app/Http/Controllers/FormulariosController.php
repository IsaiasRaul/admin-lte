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
use App\Models\User;
use Carbon\Carbon;

class FormulariosController extends Controller
{
    /**
     * Show the application formulario municipalidad.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idmunicipalidad = $this->obtenerMunicipalidad();        
        $id_estado = 1; //Creado

        foreach ($this->obtenerConvocatoria() as $value) {
            $idConvocatoria = $value->id;
        }

        //Reviso si existe el registro de la municipalidad y convocatoria en la tabla registro_formularios
        $dataRegistroForm = RegistroFormularios::where('id_convocatoria', '=', $idConvocatoria)
                                                ->where('id_municipalidad', '=', $idmunicipalidad)->get();

        //Si NO existe el registro de la municipalidad y convocatoria se inserta en la tabla registro_formularios
        if (($dataRegistroForm->isEmpty())) {
            // Creamos el objeto
            $registroForm = new RegistroFormularios();
            // Seteamos las propiedades
            $registroForm->id_estado        = $id_estado;
            $registroForm->id_convocatoria  = $idConvocatoria;
            $registroForm->id_municipalidad = $idmunicipalidad;
            $registroForm->activo           = 1;
            
            // Guardamos en la base de datos 
            $registroForm->save();
        }

        //Reviso si existe el fomulario del registro
        foreach ($dataRegistroForm as $valor) {
            $idRegistro = $valor->id;
        }        
        $registrosFormRespuesta = FormularioRespuestas::where('id_registro',$idRegistro)->get();

        //Si NO existe el registro en formularios respuesta se inserta en la tabla formularios_respuesta
        if (($registrosFormRespuesta->isEmpty())) {
            //obtenemos formulario maestro
            $formulario = Formularios::where('id_producto',env('ID_PROGRAMA'))->get();
            
            foreach($formulario as $valorForm){
                //echo $valorForm->id." <br>";

                // Creamos el objeto
                $formRepuesta = new FormularioRespuestas();
                // Seteamos las propiedades
                $formRepuesta->id_formulario        = $valorForm->id;
                $formRepuesta->id_registro          = $idRegistro;
                $formRepuesta->id_tipo_respuesta    = 1;
            
                // Guardamos en la base de datos 
                $formRepuesta->save();
            }        
        }
       
        //Obtenemos los datos para enviarlos a la vista
        $municialidad = Municipalidades::where('id',$idmunicipalidad)->get();
        $registrosForm = RegistroFormularios::where('id_municipalidad',$idmunicipalidad)
                                           ->where('activo',1)
                                           ->with('municipalidad')
                                           ->with('convocatorias')
                                           ->with('estados')
                                           ->paginate();
        
        return view('municipio.registrosform', ['registrosForm' => $registrosForm, 'munidata'=>$municialidad] );
    }

    public function formulario_respuesta(Request $request)
    {
        /**Obtener id municipalidad del usuario ROL */
        $idmunicipalidad = $this->obtenerMunicipalidad();
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

    public function obtenerMunicipalidad()
    {
        /**Obtener id municipalidad del usuario ROL */
        $datosUsuario = auth()->user();
        if (!is_null($datosUsuario->id_municipalidad)) {
            $idmunicipalidad = $datosUsuario->id_municipalidad;
        } else {
            $idmunicipalidad = 0;
        }

        return $idmunicipalidad;
    }

    public function obtenerConvocatoria()
    {

        $convocatoria = Convocatorias::all()
        ->where('activo', 1)
        ->where('fecha_inicio', '<=', Carbon::now()->toDateTimeString())
        ->where('fecha_fin', '>=', Carbon::now()->toDateTimeString());

        return $convocatoria;
    }
 
    public function guardar(Request $request)
    {
       /* $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);*/
        
        dd($request);
    } 
}
