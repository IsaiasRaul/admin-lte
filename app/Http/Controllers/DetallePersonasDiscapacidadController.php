<?php

namespace App\Http\Controllers;

use App\Models\Detallepersonasdiscapacidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DetallePersonasDiscapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->ajax()) {
            $messages = [
                'rut.required' => 'Campo RUN es requerido',
                'rut.unique' => 'Este RUN ya se encuentra agregado',
                'estamento.required' => 'Debe seleccionar un estamento',
                'calidad_contractual.required' => 'Debe selecionar calidad contractual',
                'jornanda_laboral.required' => 'Debe seleccionar una jornada laboral'

            ];

            $camposValidacion = [
                'rut' => ['required', Rule::unique('detallepersonasdiscapacidads')->ignore($request->rut)->whereNull('deleted_at')],
                'estamento' => 'required',
                'calidad_contractual' => 'required',
                'jornanda_laboral' => 'required'
            ];

            $validator = Validator::make($request->all(),$camposValidacion,$messages);
            

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            } else {
                Detallepersonasdiscapacidad::create([
                    'id_registro' => $request->idregistro,
                    'rut'  => $request->rut,
                    'id_estamento' => $request->estamento,
                    'id_calidad_contractual' => $request->calidad_contractual,
                    'id_jornada_laboral' => $request->jornanda_laboral,
                    'monto_remuneracion_imponible' => $request->monto_remuneracion,
                    'id_verificador_cumplimiento' => $request->verificador_cumplimiento,
                    'genero' => $request->genero,
                    'fecha_ingreso_institucion' => $request->fecha_ingreso_institucion,
                    'periodo_contratacion_desde' => $request->periodo_contratacion_desde,
                    'periodo_contratacion_hasta' => $request->periodo_contratacion_hasta,
                ]);
        
                return response()->json(['success' => true, 'message' => 'success'], 200);            
            }

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (isset($request->id)) {
            $detallePersonaDis = Detallepersonasdiscapacidad::where('id_registro', $request->idregistro)
            ->where('id',$request->id)
            ->where('deleted_at','=',NULL)
            ->with('estamentos')
            ->with('calidad_contractual')
            ->with('jornada_laboral')
            ->with('verificador_cumplimiento')
            ->get();
        } else {
            $detallePersonaDis = Detallepersonasdiscapacidad::where('id_registro', $request->idregistro)
            ->where('deleted_at','=',NULL)
            ->with('estamentos')
            ->get();        
        }

        return response()->json(['data' => $detallePersonaDis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;                        
        $detallePersonaDis = Detallepersonasdiscapacidad::find($id);
        $detallePersonaDis->rut = $request->rut;
        $detallePersonaDis->id_estamento = $request->estamento;
        $detallePersonaDis->id_calidad_contractual = $request->calidad_contractual;
        $detallePersonaDis->id_jornada_laboral = $request->jornanda_laboral;
        $detallePersonaDis->monto_remuneracion_imponible = $request->monto_remuneracion;
        $detallePersonaDis->id_verificador_cumplimiento = $request->verificador_cumplimiento;
        $detallePersonaDis->genero = $request->genero;
        $detallePersonaDis->fecha_ingreso_institucion = $request->fecha_ingreso_institucion;
        $detallePersonaDis->periodo_contratacion_desde = $request->periodo_contratacion_desde;
        $detallePersonaDis->periodo_contratacion_hasta = $request->periodo_contratacion_hasta;
        $detallePersonaDis->save();

        return response()->json(['success' => true, 'message' => 'success'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $idRegistro = $request->idregistro;
        $fechaHoy = date('Y-m-d H:i:s');

        Detallepersonasdiscapacidad::where('id_registro',$idRegistro )
        ->where('id', $id)
        ->update(['deleted_at' => $fechaHoy]);

        return response()->json(['success' => true, 'message' => 'success'], 200);
    }

    public function view_persona(Request $request)
    {
        
        $detallePersonaDis = Detallepersonasdiscapacidad::where('id', $request->id)
                                                          ->where('id_registro', $request->idregistro)
                                                          ->where('deleted_at','=',NULL)->get();
              
        //dd($detallePersonaDis);
        return response()->json(['data' => $detallePersonaDis]);
    }
}
