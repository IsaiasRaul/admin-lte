<?php

namespace App\Http\Controllers;

use App\Models\Detallepersonasdiscapacidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                'rut.unique' => 'Campo RUN debe ser único',
                'estamento.required' => 'Debe seleccionar un estamento',
                'calidad_contractual.required' => 'Debe selecionar calidad contractual',
                'jornanda_laboral.required' => 'Debe seleccionar una jornada laboral'

            ];

            $camposValidacion = [
                'rut' => 'required|unique:detallepersonasdiscapacidads',
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
        
        $detallePersonaDis = Detallepersonasdiscapacidad::where('id_registro', $request->idregistro)->get();
              
//        return response()->json(['success' => $detallePersonaDis, 'message' => 'success'], 200);
        return response()->json(['data' => $detallePersonaDis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
