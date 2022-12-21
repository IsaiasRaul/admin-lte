<div id="element" style="display: none;">
    <div class="container">
        <div id="buscador"></div>
        <div id="tabla">
            <div class="row">
                <div class="col-sm-12">
                <h4>Detalle de personas con discapacidad y/o asignatarias de pensión de invalidez</h4>
                    <table class="table table-hover table-condensed table-bordered">
                    <caption>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                            Agregar nuevo 
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </caption>
                    <thead>
                        <tr>
                            <th>RUT</th>
                            <th>Período de contratación en 2022: Fecha desde</th>
                            <th>Período de contratación en 2022: Fecha hasta</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @csrf
                    <tbody id="DataResult">
                        @foreach ($detallePersonaDis as $detallePersona)                                                                  
                        <tr id="{{$detallePersona->id}}">
                            <td>{{$detallePersona->rut}}</td>
                            <td>{{$detallePersona->periodo_contratacion_desde}}</td>
                            @if ( is_null($detallePersona->periodo_contratacion_hasta) )
                            <td>INDEFINIDO</td>
                            @else
                            <td>{{$detallePersona->periodo_contratacion_hasta}}</td>
                            @endif                                                                    
                            <td><i class="fa-solid fa-user-pen"></i></td>
                            <td>                                
                                <a title="Eliminar este colaborador con discapacidad" class="remove" onclick="eliminarColaboradorDiscapacidad({{$detallePersona->id}})" href="#">
                                    <i id="delete" class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para registros nuevos -->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                                                    
                </div>                                                    
                <div class="modal-body">
                @csrf
                    <!-- Visualizacion de errores modal -->
                    <div class="alert alert-danger" style="display:none"></div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="rut">
                                RUN
                                </label>
                                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="rut" id="rut" type="text" placeholder="Rut persona con discapacidad" onchange="revisarRun();" >
                                <!-- <div>
                                <span class="text-red-500 text-xs italic">
                                    Please fill out this field.
                                </span>
                                </div>-->
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="estamento">
                                Estamento
                                </label>
                                <div>
                                <select class="w-full bg-gray-200 border border-gray-200 text-black text-sm py-3 px-4 pr-8 mb-3 rounded" id="estamento" >
                                    <option value="">Seleccione</option>                                                        
                                    @foreach ($opcionesestamentos as $estamentos)
                                    <option value="{{ $estamentos->id }}">{{ $estamentos->estamento }}</option>    
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                            <div class="md:w-full px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="calidad_contractual">
                                Calidad Contractual
                                </label>
                                <div>
                                <select class="w-full bg-gray-200 border border-gray-200 text-black text-sm py-3 px-4 pr-8 mb-3 rounded" id="calidad_contractual">
                                    <option value="">Seleccione</option>                                                        
                                    @foreach ($opcinoescalidadContractual as $calidadContractual)
                                    <option value="{{ $calidadContractual->id }}">{{ $calidadContractual->calidad_contractual }}</option>    
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            </div>
                            <div class="-mx-3 md:flex mb-2">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="jornanda_laboral">
                                Jornada Laboral
                                </label>
                                <div>
                                <select class="w-full bg-gray-200 border border-gray-200 text-black text-sm py-3 px-4 pr-8 mb-3 rounded" id="jornanda_laboral">
                                    <option value="">Seleccione</option>                                                        
                                    @foreach ($opcionesjornadaLaboral as $jornadaLaboral)
                                    <option value="{{ $jornadaLaboral->id }}">{{ $jornadaLaboral->jornada_laboral }}</option>    
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="monto_remuneracion">
                                Monto Remuneración Imponible
                                </label>
                                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="monto_remuneracion" type="number" placeholder="Monto remuneración imponible">
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="verificador_cumplimiento">
                                Verificador De Cumplimiento
                                </label>
                                <div>
                                <select class="w-full bg-gray-200 border border-gray-200 text-black text-sm py-3 px-4 pr-8 mb-3 rounded" id="verificador_cumplimiento">
                                    <option value="">Seleccione</option>                                                        
                                    @foreach ($opcionesverificadorCumplimiento as $verificadorCumplimiento)
                                    <option value="{{ $verificadorCumplimiento->id }}">{{ $verificadorCumplimiento->verificador_cumplimiento }}</option>    
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="genero">
                                Género
                                </label>
                                <div>
                                <select class="w-full bg-gray-200 border border-gray-200 text-black text-sm py-3 px-4 pr-8 mb-3 rounded" id="genero">
                                    <option value="">Seleccione</option>                                                        
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="O">Otro</option>
                                </select>
                                </div>
                            </div>

                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="fecha_ingreso_institucion">
                                Fecha De Ingreso a la Institución
                                </label>
                                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="fecha_ingreso_institucion" type="date" placeholder="Fecha de ingreso a la institución">
                            </div>

                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="periodo_contratacion_desde">
                                Periodo de contratación en 2022: Fecha desde
                                </label>
                                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="periodo_contratacion_desde" type="date" placeholder="Periodo de contratación en 2022:Fecha desde ">
                            </div>

                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-sm font-bold mb-2" for="periodo_contratacion_hasta">
                                Periodo de contratación en 2022: Fecha hasta
                                </label>
                                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="periodo_contratacion_hasta" type="date" placeholder="Periodo de contratación en 2022:Fecha hasta ">
                            </div>                                                                         
                            </div>
                            <input id="idregistro" name="idregistro" type="hidden" value="{{$formrespuesta->id_registro}}">
                            <div class="-mx-3 md:flex mt-2">
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardarnuevo">
                            Agregar
                            </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <!-- Modal para edicion de datos -->
    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            </div>
            <div class="modal-body">
                <input type="text" hidden="" id="idpersona" name="">
                <label>Nombre</label>
                <input type="text" name="" id="nombreu" class="form-control input-sm">
                <label>Apellido</label>
                <input type="text" name="" id="apellidou" class="form-control input-sm">
                <label>Email</label>
                <input type="text" name="" id="emailu" class="form-control input-sm">
                <label>telefono</label>
                <input type="text" name="" id="telefonou" class="form-control input-sm">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>            
            </div>
        </div>
        </div>
    </div>

</div>

<!-- Con este condicional abrimos el modal si hay un error de validacion en el backend -->
@if($errors->any())
<script>
$('#modalNuevo').modal('show');
</script>
@endif