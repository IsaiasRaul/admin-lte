<?php

namespace App\Http\Controllers;

use App\Models\CalidadContractual;
use App\Models\Convocatorias;
use App\Models\Detallepersonasdiscapacidad;
use App\Models\Estamento;
use App\Models\Etapaproductos;
use App\Models\FormularioOption;
use Illuminate\Http\Request;
use App\Models\FormularioRespuestas;
use App\Models\Formularios;
use App\Models\JornadaLaboral;
use App\Models\Municipalidades;
use App\Models\RegistroFormularios;
use App\Models\ReglasFormulario;
use App\Models\ReglasFormularioMensaje;
use App\Models\User;
use App\Models\VerificadorCumplimiento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class FormulariosController extends Controller
{
    /**
     * Show the application formulario municipalidad.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $option_envio_final = false;
        if(isset($_GET['envio'])){
            if($_GET['envio'] == 'xhers'){
                $option_envio_final = true;
            }
        }

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
            
            /*  Obtenemos el ID ingresado, 
                ya que va vacio la primera vez desde
                la variable anterior ($dataRegistroForm)
            */
            $dataRegistroForm = RegistroFormularios::where('id_convocatoria', '=', $idConvocatoria)
                                                    ->where('id_municipalidad', '=', $idmunicipalidad)->get();
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
       
        $obtener_estado_registro = RegistroFormularios::find($idRegistro);
        $estado_actual = $obtener_estado_registro->id_estado;

        //Obtenemos los datos para enviarlos a la vista
        $municialidad = Municipalidades::where('id',$idmunicipalidad)->get();
        $registrosForm = RegistroFormularios::where('id_municipalidad',$idmunicipalidad)
                                           ->where('activo',1)
                                           ->with('municipalidad')
                                           ->with('convocatorias')
                                           ->with('estados')
                                           ->paginate();
        
        return view('municipio.registrosform', ['registrosForm' => $registrosForm, 'munidata'=>$municialidad, 'option_envio_final' => $option_envio_final,'estado_actual'=>$estado_actual] );
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

        //opciones asociado al formulario
        $opcionesForm = FormularioOption::with('formulariosOption')->get();

        //opciones para el formulario contratacion de personas
        
        $opcionesestamentos             = Estamento::get();
        $opcinoescalidadContractual     = CalidadContractual::get();
        $opcionesjornadaLaboral         = JornadaLaboral::get();
        $opcionesverificadorCumplimiento = VerificadorCumplimiento::get();

        $detallePersonaDis = Detallepersonasdiscapacidad::where('id_registro', $request->idregistro)
                                                        ->where('deleted_at','=',NULL)->get();

        $validacionfinal = json_decode($this->validacion_final($request->idregistro));

        return view('municipio.form', compact(['forms',
                                                'etapasFormulario',
                                                'munidata',
                                                'convocatoriaData',
                                                'opcionesForm',
                                                'opcionesestamentos',
                                                'opcinoescalidadContractual',
                                                'opcionesjornadaLaboral',
                                                'opcionesverificadorCumplimiento',
                                                'detallePersonaDis',
                                                'validacionfinal']) );
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
 
    public function store(Request $request)
    {
        $etapaIdCurr = $request->currStepIndex;
        $etapaId = null;
        
        /** 0:Identificacion del informante 
         *  1: Seleccion preferente
         *  2: Medidad de accesivilidad en proceso de seleccion
         *  3: Mantenci??n Y Contrataci??n De Personas Con Discapacidad
         *  4: Difusi??n Informes Per??odo Anterior Reportado
         *  5: T??rmino Y Env??o De Formulario
         * 
         * Se homologa a etapa con modulo desde wizar
        */
        if ($etapaIdCurr == 0) {
                $etapaId = 1;
        } elseif ($etapaIdCurr == 1 ){
            $etapaId = 2;
        } elseif ($etapaIdCurr == 2 ){
            $etapaId = 3;
        } elseif ($etapaIdCurr == 3 ){ 
            $etapaId = 4;
        } elseif ($etapaIdCurr == 4 ){ 
            $etapaId = 5;
        } elseif ($etapaIdCurr == 5 ){
            $etapaId = 6;
        }

        

        if ($request->ajax()) {
            
            /** Obtengo las reglas del formulario desde la BD */
            $erroresCampos = FormularioRespuestas::where('id_registro',$request->idregistro)
                                                 ->with('formularios')
                                                 ->with('reglas_formularios')
                                                 ->get();

            

            $formName_array = array();
            $regla_array = array();
            $messages = array();
            $camposvalido = array();
            foreach ($erroresCampos as $key => $value) {                                
                if (isset($value->reglas_formularios->regla)) {
                    
                    if ($etapaId == $value->formularios->id_etapa_producto) {
                        array_push($formName_array, $value->formularios->name."_".$value->formularios->id);
                        array_push($regla_array ,$value->reglas_formularios->regla);                    
                                                                                
                        $camposvalido = array_combine($formName_array, $regla_array);                    
                    }

                }
            }

            

            /**Obtengo mensajes de las reglas */
            $campoReglaArray = array();
            $valorReglaArray = array();
            $mensajesReglas = ReglasFormularioMensaje::with('reglas_formularios_mensaje')->get();
            foreach ($mensajesReglas as $key => $reglasmensaje) {                
                $id_formulario_mensaje = $reglasmensaje->reglas_formularios_mensaje->id_formulario;
                if (!is_null($id_formulario_mensaje)) {
                    /* obtengo nombre del formulario para vincularlo a las reglas por campos */
                    $formulario_maestro = Formularios::where('id', $id_formulario_mensaje)->get();
                    foreach ($formulario_maestro as $valorForm) {
                        $nombreFormValidate = $valorForm->name."_".$valorForm->id.".".$reglasmensaje->configuracion_mensaje;
                        /**Vincular campo con tipo de validacion y su mensaje */
                        array_push($campoReglaArray, $nombreFormValidate);
                        array_push($valorReglaArray, $reglasmensaje->mensaje);
                        $camposmensajes = array_combine($campoReglaArray, $valorReglaArray);
                    }
                    
                }
                
            }


            
          
            /** COMENTADO: Ejemplo de validacion con Laravel Validator */
            /*$messages = [
                'nombre_quien_responde_1.required' => 'Campo Nombre no puede ser vacio',
                'nombre_quien_responde_1.max' => 'Campo Nombre no puede exceder los 2000 caracteres',
                'cargo_2.required' => 'El campo cargo no puede ser vacio',
                'correo_electronico_institucional_3.required' => 'El campo Correo electr??nico institucional no puede ser vacio.',
                'correo_electronico_institucional_3.email' => 'Correo electronico no es v??lido como formato.'
            ];

            $camposValidacion = [
                'nombre_quien_responde_1' => 'required|max:255',
                'cargo_2' => 'required',
                'correo_electronico_institucional_3' => 'required|email'                
            ];*/

            

            $validator = Validator::make($request->all(),$camposvalido,$camposmensajes);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            } else {
                $forms = FormularioRespuestas::where('id_registro',$request->idregistro)
                                                ->with('formularios')
                                                ->get();
            
                foreach ($forms as $formulario) {
                    $nameForm = $formulario->formularios->name."_".$formulario->formularios->id;
                    $dataIngresada = $request->$nameForm;

                    if($nameForm == 'motivo_no_seleccion_11'){
                        $specialCheckebox = $request->$nameForm;
                        if (isset($specialCheckebox)) {
                            $selected  = implode(',', $specialCheckebox);

                            FormularioRespuestas::where('id_registro', $request->idregistro)
                            ->where('id_formulario', $formulario->formularios->id)
                            ->update(['respuesta' => $selected]);
                            
                        }


                    }else{
                        FormularioRespuestas::where('id_registro', $request->idregistro)
                        ->where('id_formulario', $formulario->formularios->id)
                        ->update(['respuesta' => $dataIngresada]);
                    }
                    

                }

                //return response()->json(['success'=>'Ok']);

                return response()->json(['success' => true, 'message' => 'success'], 200);
            }
        }
    }
    
    public function validacion_final($idRegistro)
    {
        $formularioRespuesta = FormularioRespuestas::where('id_registro',$idRegistro)->where('id_tipo_respuesta',1)->get();
        
        $validacion = array();
        /**Validaciones para enviar el formulario etapa final */       
        $cumple_seleccion_preferente = false;
        $cumple_porcentaje_dotacion_max = false;
        $cuota_contratacion = false;
        $respuesta5=null;
        $respuesta8=null;
        $respuesta9=null;        
        $respuesta10=null;
        $respuesta15=null;

        foreach($formularioRespuesta as $respuesta){                        
            /** 
             *  id_formulario = 6: pregunta 5
             *  id_formulario = 8: pregunta 7
             *  id_formulario = 10: pregunta 9 
             *  id_formulario = 9: pregunta 8
             *  id_formulario = 11: pregunta 10
             *  id_formulario = 18: pregunta 15
            */
            if($respuesta->id_formulario == 6){
                
                $respuesta5 = intVal(trim($respuesta->respuesta));
            }

            if($respuesta->id_formulario == 8){
                
                $respuesta7 = intVal(trim($respuesta->respuesta));
            }            

            if($respuesta->id_formulario == 9){
                
                $respuesta8 = intVal(trim($respuesta->respuesta));
            }

            if($respuesta->id_formulario == 10){
                
                $respuesta9 = intVal(trim($respuesta->respuesta));
            }

            if($respuesta->id_formulario == 11){                
                $respuesta10 = trim($respuesta->respuesta);
            }

            if($respuesta->id_formulario == 18){                
                $respuesta15 = intVal(trim($respuesta->respuesta));
            }            
        }


        /** [1] Cumple selecci??n preferente: 
         * Valor ingresado en pregunta 9 = valor ingresado en pregunta 8 y
         * valor ingresado en 8 >0 
         * Valor ingresado en pregunta 9 < valor ingresado en pregunta 8 y 
         * 10= b ?? c */  
        if( ($respuesta9 === $respuesta8) && ($respuesta8 > 0) || (($respuesta9 < $respuesta8) && ( (strpos($respuesta10, '2') !== false) || (strpos($respuesta10, '3') !==false ))) )
        {
            $cumple_seleccion_preferente = 1; //si es true cumple
        }

        /**
         * [2] No aplica selecci??n preferente: 
         * Valor ingresado en 5=0 ?? Valor ingreso en 7= 0 ?? valor ingreso en 8= 0
         * valor ingresado en 8 es > 0 y valor ingresado en 9 =< valor ingresado en 8 y valor ingresado en 10 = a
         */
        if( $respuesta5 == 0 || $respuesta7 == 0 || $respuesta8 == 0 ){
            $cumple_seleccion_preferente = 2; //si es 2 NO APLICA
        }

        if( ($respuesta8 > 0) && ($respuesta9 <= $respuesta8) && (strpos($respuesta10, '1') !== false ) ){
            $cumple_seleccion_preferente = 2; //si es 2 NO APLICA
        }

        /**
         * [3] No cumple selecci??n preferente 
         * valor ingresado en 9 es > al valor ingresado en 8
         * valor ingresado en 10 es d y con posterioridad se determina que no entrega razones que justifiquen.
         */
        if( ($respuesta9 > $respuesta8) || (strpos($respuesta10, '4') !== false) ){
            $cumple_seleccion_preferente = 3; //si es 3 NO cumple
        }

        /**
         * [4] Falta informaci??n: Su respuesta debe ser revisada.  
         * valor ingresado en 8 es > 0 y valor ingresado en 9 < valor ingresado en 8 y responde d) ???Otro??? en pregunta 10.
         * valor ingresado en 10 es d y con posterioridad se determina que no entrega razones que justifiquen.
         */
        if( ($respuesta8 > 0) && ($respuesta9 < $respuesta8) && (strpos($respuesta10, '4') !== false ) ){
            $cumple_seleccion_preferente = 4; //si es 4 Falta informaci??n
        }

        /**
         * (B) 1% de la dotaci??n m??xima en 2022 
         * Mostrar el resultado del c??lculo autom??tico del 1% de la dotaci??n m??xima informada en pgta. 15 
         * En caso de que el c??lculo resulte en n??mero con decimales, aproximar al entero inferior 
         * Si el dato registrado en pregunta 15 es inferior a 100, mostrar mensaje ???Instituci??n no obligada a cumplir cuota de contrataci??n de personas con discapacidad o asignatarias de pensi??n de invalidez???
         * */
        $unoporciento = floor(($respuesta15*1/100));
        
        if($respuesta15 < 100){
            $cumple_porcentaje_dotacion_max = 3;
        }

        /** (C) Cuota de contrataci??n de personas con discapacidad 
         * Calcular cu??ntas personas estuvieron contratadas en ??ltimo d??a de cada mes del a??o calendario. Obteniendo 12 valores
         * promediar los valores de los 12 meses. 
         * dividir el promedio obtenido por la cifra expresada en la dotaci??n m??xima (Pgta 15). 
         * Aproximar resultado al entero inferior 
         * Este dato se calcula para todas las Municipalidades, independiente de cu??nto fue su dotaci??n m??xima (Pgta 15)
         * 
        */
        $detallePersonaDis = Detallepersonasdiscapacidad::where('id_registro', $idRegistro)
                                                        ->where('deleted_at','=',NULL)->get();
        
        $personasDiscapacitada = [];
        $meses = array();
        $bandera = null;
        $v = 0;    
        foreach ($detallePersonaDis as $key => $detallePersona) {
            //dd($detallePersona);
            $fechaInicio=strtotime($detallePersona->periodo_contratacion_desde);
            $fechaFin=strtotime($detallePersona->periodo_contratacion_hasta);
 
            for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                $periodo_inicio = date("Y-m-d", $i);
                $periodo_fin = date("Y-m-d", $i);
                $fecha_fin_mes = date("Y-m-t", $i);
                $mes = date("m", $i);
                
                
                //echo $periodo_inicio." ".$periodo_fin . " " . $fecha_fin_mes. "<- ".$detallePersona->rut." <br>";                
                if ($periodo_fin == $fecha_fin_mes) {
                    array_push($meses, ['rut'=>$detallePersona->rut, 'mes' => $mes]);                    
                }
            }                             
            
        }

        $contar_personas = 0;
        $suma_mes_personas = 0;
        foreach($meses as $mes_rut){            
            if ($bandera === $mes_rut['rut']) {
                $v = 1;  
            }
            
            /*echo '<pre>';
            echo  $bandera." ".$mes_rut['rut']." ".$mes_rut['mes']." ".$v." <br>";
            echo '</pre>'; */

            for ($i = 1; $i <= 12; $i++) {
                if ($mes_rut['mes'] == $i) {
                    //echo " MES->".$i." / MES PERSONA->".$mes_rut['mes']." <br>";
                    /** Contar personas */            
                    $contar_personas = ($contar_personas + 1);                    
                }
                
            }

            $v = 0;
            $bandera = $mes_rut['rut'];
        }
                       
        $cuota_contratacion = floor(($contar_personas/12));

        /**
         * (D) Resultado preliminar cuota de contrataci??n
         * [1] Cumple cuota de contrataci??n: Si valor (B) es = ?? > que (A); y Pgta 15 es =??> 100 
         * [2] No cumple cuota de contrataci??n: Si valor (B) es < que (A); y Pgta 15 es =??> 100:  
         * [3] Cumple no obligada: Si valor (B) es = ?? > que (A); y Pgta 15 es < 100  
         * [4] No obligada: Si valor (B) es < que (A); y Pgta 15 es < 100:  
         * [5] Falta informaci??n: esta categor??a puede ser marcada en forma manual por administrador, cuando se detecten inconsistencias en valores entregados.
         */

        $resultado_pre_couta_contratacion = false;
        if( $cumple_seleccion_preferente == 1  && $respuesta15 >= 100 ){
            $resultado_pre_couta_contratacion = 1; //cumple
        }

        if( $cumple_seleccion_preferente !== 1  && $respuesta15 >= 100 ){
            $resultado_pre_couta_contratacion = 2; //NO cumple
        }
        
        if( $unoporciento > 0 && $cumple_seleccion_preferente == 1 && $respuesta15 < 100 ){
            $resultado_pre_couta_contratacion = 3; //Cumple no obligada
        }

        if( ($cumple_seleccion_preferente == 1 || $cumple_seleccion_preferente == 2 || $cumple_seleccion_preferente == 3 || $cumple_seleccion_preferente == 4) && $respuesta15 < 100 ){
            $resultado_pre_couta_contratacion = 4; //No obligada
        }

        if( $unoporciento > 0 && $cumple_seleccion_preferente == 4 && $respuesta15 > 100 ){
            $resultado_pre_couta_contratacion = 5; //Falta informaci??n
        }

        /**
         * (E) Cumplimiento Global Ley 21.015 (preliminar)
         * [E1] Cumple selecci??n preferente y cuota de contrataci??n (Obligada) 
         * En (A), categor??a [1] ?? categor??a [2] y en (D) categor??a [1] 
         * Texto a mostrar: ???Cumple selecci??n preferente y cuota de contrataci??n (Obligada): La Municipalidad declara cumplir con las obligaciones de 
         * selecci??n preferente y de mantenci??n y contrataci??n de personas con discapacidad y/o asignatarias de pensi??n de invalidez en 2022, 
         * estando obligada por tener una dotaci??n de 100 o m??s funcionarios/trabajadores???
         * 
         * [E2] Cumple selecci??n preferente y cuota de contrataci??n (No obligadas)
         * En (A), categor??a [1] ?? categor??a [2] y en (D) categor??a [3] 
         * 
         * [E3] Cumple no obligada: Informa y no aplica selecci??n preferente ni cuota de contrataci??n 
         * En (A), categor??a [1] ?? categor??a [2] y en (D) categor??a [4] 
         * 
         * [E4] Cumple parcial: En cumplimiento de selecci??n preferente, no cumple cuota de contrataci??n, debe presentar excusas
         * En (A), categor??a [1] ?? categor??a [2] y en (D) categor??a [2] 
         * 
         * [E5] No Cumple selecci??n preferente, cumple cuota de contrataci??n:
         * en (A) obtiene categor??a [3]; y en (D) obtiene categor??a [1]
         */
        $cumplimiento_global = false;
        if( ($cumple_seleccion_preferente == 1 || $cumple_seleccion_preferente ==2) && ($resultado_pre_couta_contratacion == 1)){
            $cumplimiento_global = 1; // [E1] Cumple selecci??n preferente y cuota de contrataci??n (Obligada) 
        }

        if(($cumple_seleccion_preferente == 1 || $cumple_seleccion_preferente ==2) && ($resultado_pre_couta_contratacion == 3)){
            $cumplimiento_global = 2; // [E2] Cumple selecci??n preferente y cuota de contrataci??n (No obligadas)
        }

        if(($cumple_seleccion_preferente == 1 || $cumple_seleccion_preferente ==2) && ($resultado_pre_couta_contratacion == 4)){
            $cumplimiento_global = 3; // [E3] Cumple no obligada: Informa y no aplica selecci??n preferente ni cuota de contrataci??n 
        }

        if(($cumple_seleccion_preferente == 1 || $cumple_seleccion_preferente ==2) && ($resultado_pre_couta_contratacion == 2)){
            $cumplimiento_global = 4; // [E4] Cumple parcial: En cumplimiento de selecci??n preferente, no cumple cuota de contrataci??n, debe presentar excusas
        }

        if(($cumple_seleccion_preferente == 3) && ($resultado_pre_couta_contratacion == 1)){
            $cumplimiento_global = 5; // [E5] No Cumple selecci??n preferente, cumple cuota de contrataci??n
        }

        if(($cumple_seleccion_preferente == 4) || ($resultado_pre_couta_contratacion == 5)){
            $cumplimiento_global = 6; // [E6] Falta informaci??n para determinar cumplimiento de ambas obligaciones
        }

        array_push($validacion, ['cumple_seleccion_preferente'=>$cumple_seleccion_preferente, //A
                                 'unoporciento'=>$unoporciento, //B
                                 'cumple_porcentaje_dotacion_max'=>$cumple_porcentaje_dotacion_max, //B
                                 'cuota_contratacion'=>$cuota_contratacion, //C
                                 'resultado_pre_couta_contratacion' => $resultado_pre_couta_contratacion, //D
                                 'cumplimiento_global' => $cumplimiento_global //E
                                ]
                    );
        
        return json_encode($validacion);
    }

    public function formulario_finaliza(Request $request)
    {
        $validacionfinal = json_decode($this->validacion_final($request->idregistro));
        
        return view('municipio.finalizar',compact('validacionfinal'));
        
    }

    public function actualiza_estado(Request $request)
    {
        //dd($request);
        $cambio_estado = $this->log_estados($request->idregistro,5);                

        if($cambio_estado !== false){
            return response()->json(['success' => true, 'message' => 'success'], 200);
        }else{
            return response()->json(['success' => false, 'errors' => 'ERROR'], 422);
        }
        
    }

    public function log_estados($idRegistro,$idestado)
    {
        $obtener_estado_registro = RegistroFormularios::find($idRegistro);
        $estado_actual = $obtener_estado_registro->id_estado;

        RegistroFormularios::where('id', $idRegistro)->update(['id_estado' => $idestado]);

        $registroForm = RegistroFormularios::find($idRegistro);
        $registroForm->id_estado = $idestado;         
        $registroForm->save();        
        
        $estado_modificado = $registroForm->id_estado;        
        // save retorna un boolean, podr??an usarlo as??:
        if( $estado_actual !==  $estado_modificado){
            return true;
        }else{
            return false;
        }

        
    }
}
