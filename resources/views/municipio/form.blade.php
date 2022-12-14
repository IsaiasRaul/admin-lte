@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                    
                    <h4 class="m-0"> Formulario Reporte Ley 21.015 </h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">                         
                        @foreach ($munidata as $muni)
                        Municipalidad: Ley 21015 Municipalidades - {{ $muni->nombre }}
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="messages"></div>

       @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <p><a href="{{ route('form') }}" >Inicio </a>-> Formulario</p>
            <form id="enviar" action="javascript:void(0)" method="post">
            <div id="wizard">
                @foreach ($etapasFormulario as $etapasForm)
                <h2>{{ $etapasForm->title }}</h2>
                <section style="width: 100%; height: 100%; overflow-y: scroll;">                    
                        @csrf
                        @foreach ($forms as $formrespuesta)
                            @if( $etapasForm->id == $formrespuesta->formularios->id_etapa_producto)
                                <div class="form-group col-md-12">
                                    <!-- Tipo input 11: solo label -->
                                    @if($formrespuesta->formularios->id_tipo_input == 11 )                                    
                                        <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                        <a href="#ModalHelp_{{$formrespuesta->formularios->id}}" role="button" class="icon-block" data-toggle="modal">
                                            <i class="fa-solid fa-circle-info"></i>
                                            <span>Ayuda</span>                                        
                                        </a>                                    
                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="ModalHelp_{{$formrespuesta->formularios->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Ayuda - {{ $etapasForm->title }} </h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text" align="justify"><small>
                                                            {{ $formrespuesta->formularios->label }}
                                                        </small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    @endif
 
                                    <!-- Tipo input id 1: Text -->
                                    @if($formrespuesta->formularios->id_tipo_input == 1 )
                                    <div class="form-group"> 
                                        <label for="text">{{ $formrespuesta->formularios->label }}</label>
                                        <input type="text" class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}" 
                                            placeholder="{{ $formrespuesta->formularios->label }}" required="{{$formrespuesta->formularios->requerido }}" value="{{ $formrespuesta->respuesta }}">
                                    </div>
                                    @endif
                                    
                                    <!-- Tipo input id 2: TextArea -->
                                    @if($formrespuesta->formularios->id_tipo_input == 2 )
                                    <div class="form-group"> 
                                    <label for="textarea">{{ $formrespuesta->formularios->label }}</label>
                                        <textarea class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                        name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                        aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}" rows="5">{{ $formrespuesta->respuesta }}</textarea>
                                    </div>
                                    @endif

                                    <!-- Tipo input id 3: Select -->
                                    <!-- desarrolla: Se obtienen opciones desde la tabla FormOptions. -->
                                    @if($formrespuesta->formularios->id_tipo_input == 3 )
                                    <div class="form-group"> 
                                        <label for="singleselect">{{ $formrespuesta->formularios->label }}</label>
                                        <select class="form-select" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}">
                                            @if($opcionesForm->isEmpty())
                                            <option value="0">Problemas al cargar opciones, contáctese con el administrador</option> 
                                            @else
                                            @php
                                            $seleccionado = "selected";
                                            @endphp
                                            <option value="0">Seleccione</option>  
                                                @foreach ($opcionesForm as $option)                                              
                                                    @if ($option->id_formulario == $formrespuesta->formularios->id )  
                                                        @if( !is_null($formrespuesta->respuesta) or !empty($formrespuesta->respuesta) )
                                                        <option value="{{ $option->opciones }}" {{$seleccionado}} > {{ $option->opciones }} </option>
                                                         @else  
                                                        <option value="{{ $option->opciones }}"> {{ $option->opciones }} </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif    
                                        </select>
                                    </div>

                                        <!-- Tabla dinamica para llenar los colaboradores discapacitados (Solo para este proyecto)-->
                                        @if ($etapasForm->id == 4)
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
                                                                <tr>
                                                                    <td>RUT</td>
                                                                    <td>Período de contratación en 2022: Fecha desde</td>
                                                                    <td>Período de contratación en 2022: Fecha hasta</td>
                                                                    <td>Editar</td>
                                                                    <td>Eliminar</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal para registros nuevos -->
                                            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>RUT</label>
                                                        <input type="text" name="" id="rut" class="form-control input-sm">
                                                        <label>ESTAMENTO</label>
                                                        <input type="text" name="" id="estamento" class="form-control input-sm">
                                                        <label>CALIDAD CONTRACTUAL</label>
                                                        <input type="text" name="" id="calidad_contractual" class="form-control input-sm">
                                                        <label>JORNADA LABORAL</label>
                                                        <input type="text" name="" id="jornada_laboral" class="form-control input-sm">
                                                        <label>MONTO REMUNERACIÓN IMPONIBLE</label>
                                                        <input type="text" name="" id="remuneracion" class="form-control input-sm">
                                                        <label>VERIFICADOR DE CUMPLIMIENTO</label>
                                                        <input type="text" name="" id="v_cumplimiento" class="form-control input-sm">
                                                        <label>GÉNERO</label>
                                                        <input type="text" name="" id="genero" class="form-control input-sm">
                                                        <label>FECHA DE INGRESO A LA INSTITUCIÓN</label>
                                                        <input type="text" name="" id="fecha_ingreso_institucion" class="form-control input-sm">
                                                        <label>Período de contratación en 2022: Fecha desde</label>
                                                        <input type="text" name="" id="periodo_contratacion_desde" class="form-control input-sm">
                                                        <label>Período de contratación en 2022: Fecha hasta</label>
                                                        <input type="text" name="" id="periodo_contratacion_hasta" class="form-control input-sm">  
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                                                    Agregar
                                                    </button>
                                                    
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
                                        @endif 
                                        <!-- hasta aca tabla dinamica -->
                                        
                                    @endif

                                    <!-- desarrollo: Se obtiene opciones desde la tabla FormOptions. -->
                                    <!-- Tipo input id 4: Radio -->
                                    @if($formrespuesta->formularios->id_tipo_input == 4 )
                                    @php
                                    $checked = "checked";
                                    @endphp
                                    <fieldset class="form-group">
                                    <label>{{ $formrespuesta->formularios->label }}</label>
                                        @foreach ($opcionesForm as $option)
                                        @if ($option->id_formulario == $formrespuesta->formularios->id )
                                        @if ($option->opciones == $formrespuesta->respuesta)
                                            @php
                                            $checked = "checked";
                                            @endphp
                                        @else
                                            @php
                                            $checked = "";
                                            @endphp
                                        @endif
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" value="{{ $option->opciones }}" {{ $checked }}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                {{ $option->opciones }}
                                            </label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </fieldset>
                                    @endif
                                  
                                    <!-- Tipo input id 5: Check -->
                                    <!-- Por desarrollar: Obtener opciones de una tabla anexa. -->
                                    @if($formrespuesta->formularios->id_tipo_input == 5 )
                                    <fieldset class="form-group">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Default checkbox
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Checked checkbox
                                        </label>
                                        </div>
                                    </fieldset>
                                    @endif

                                    <!-- Tipo input id 6: file -->
                                    @if($formrespuesta->formularios->id_tipo_input == 6 )

                                    <div class="form-group">
                                    <label for="fileupload">{{ $formrespuesta->formularios->label }}</label>
                                    <input type="file" class="form-control-file" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}">
                                    <small id="fileupload" class="form-text text-muted"> Seleccione un archivo </small>
                                    </div>
                                    @endif      
                                      
                                    <!-- Tipo input id 7: email -->
                                    @if($formrespuesta->formularios->id_tipo_input == 7 )
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">{{ $formrespuesta->formularios->label }}</label>
                                        <input type="email" class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}"
                                                value="{{ $formrespuesta->respuesta }}">
                                        <div id="emailHelp" class="form-text">{{ $formrespuesta->formularios->aria_describedby }} </div>
                                    </div>
                                    @endif        

                                    <!-- Tipo input id 8: Multiselect -->
                                    <!-- Por desarrollar: Obtener opciones de una tabla anexa. -->
                                    @if($formrespuesta->formularios->id_tipo_input == 8 )
                                    <div class="form-group">
                                        <label for="multipleselect">{{ $formrespuesta->formularios->label }}</label>
                                        <select  class="form-control" multiple id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}[]" 
                                                aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}">
                                            @if($opcionesForm->isEmpty())
                                            <option value="0">Problemas al cargar opciones, contáctese con el administrador</option> 
                                            @else                                
                                                @foreach ($opcionesForm as $option)                                              
                                                    @if ($option->id_formulario == $formrespuesta->formularios->id )
                                                    <option value="{{ $option->opciones }}"> {{ $option->opciones }} </option>
                                                    @endif
                                                @endforeach
                                            @endif    
                                        </select>
                                    </div>
                                    @endif


                                    <!-- Tipo input id 9: Especial RUN -->
                                    @if($formrespuesta->formularios->id_tipo_input == 9 )
                                    <div class="form-group"> 
                                    <label for="text">{{ $formrespuesta->formularios->label }}</label>
                                    <input type="text" onchange="revisarRun();" class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}" 
                                                        placeholder="{{ $formrespuesta->formularios->label }}">
                                    </div>
                                    @endif 

                                    <!-- Tipo input id 10: Numérico -->
                                    @if($formrespuesta->formularios->id_tipo_input == 10 )
                                    <div class="form-group"> 
                                    <label for="text">{{ $formrespuesta->formularios->label }}</label>
                                    <input type="number" ondrop="return false;" onpaste="return false;" class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}" 
                                                        placeholder="{{ $formrespuesta->formularios->label }}" value="{{ $formrespuesta->respuesta }}">
                                    </div>
                                    @endif                                    
                                </div>
                            @endif    
                        @endforeach
                        <input id="idregistro" name="idregistro" type="hidden" value="{{$formrespuesta->id_registro}}">                    
                </section>
                @endforeach
            </div>
            </form>
        </div>
    </div>
    <!-- /.content -->

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">PRESENTACIÓN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p align="justify">
                        De acuerdo a la Ley N°21.015 y su Reglamento para el sector público, los organismos de la Administración del Estado deben reportar su cumplimiento en enero de cada año respecto a los siguientes aspectos:
                        <br>
                        <ul>
                            <Blockquote style="border:none"> 
                            <li>Selección preferente de personas con discapacidad</li>
                            </blockquote>                        
                        
                            <Blockquote style="border:none"> 
                            <li>A lo menos un 1% de la dotación anual deberán ser personas con discapacidad o asignatarias de una pensión de invalidez, en las instituciones que tengan 100 o más trabajadores (No se considera personal a honorarios).</li>
                            </blockquote>
                        </ul>
                    </p>    
                    <p align="justify">                    
                        La presente consulta estará disponible del @foreach ($convocatoriaData as $convocatoria) {{ $convocatoria->fecha_inicio }} hasta el {{ $convocatoria->fecha_fin }} @endforeach , y está  dirigida sólo a las Municipalidades.
                    </p>

                    <p align="justify">   
                        Se sugiere que esta encuesta sea respondida por las áreas de Gestión y Desarrollo de Personas o Recursos Humanos de la Municipalidad, empleando la clave de usuario única que ha sido remitida a la Municipalidad. 
                    </p>
                    <p align="justify">
                        Debe entregar un único reporte por Municipalidad que considere todos los sectores de la gestión municipal, es decir, que incluya al municipio, educación y salud, SIEMPRE Y CUANDO  NO SEAN CORPORACIONES.
                    </p>
                    <p align="justify">
                        Las Corporaciones Municipales, al ser organismos privados, deben entregar su reporte   en la plataforma de la Dirección del Trabajo en el siguiente portal: <a  target="blank" href="https://tramites.dirtrab.cl/registroempresa/"> https://tramites.dirtrab.cl/registroempresa/</a>
                    </p>
                    <p align="justify">
                        Los Servicios Locales de Educación Pública y el resto de los organismos de la Administración del Estado deben entregar su reporte a través de la plataforma del Servicio Civil <a  target="blank" href="https://reportabilidadgp.serviciocivil.cl">https://reportabilidadgp.serviciocivil.cl</a>
                    </p>
                    <p align="justify">
                        Ante cualquier duda, dirigirse al correo electrónico <a href="mailto:consultaleyinclusion@senadis.cl">consultaleyinclusion@senadis.cl</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script> //console.log('Hi!'); </script> 
    <script>
    $( document ).ready(function() {
        $('#myModal').modal('toggle')
    });    
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#guardarnuevo').click(function(){
                alert('ACA');
            //nombre=$('#nombre').val();
           // apellido=$('#apellido').val();
            // email=$('#email').val();
            //telefono=$('#telefono').val();
                //agregardatos(nombre,apellido,email,telefono);
            });



            $('#actualizadatos').click(function(){
            //actualizaDatos();
            });

        });
    </script>    
@stop