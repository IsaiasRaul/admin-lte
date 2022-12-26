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



        <div>
            <p><a href="{{ route('form') }}" >Inicio </a>-> Formulario</p>
            <form id="enviar" action="javascript:void(0)" method="post">
            <div id="wizard">
                @foreach ($etapasFormulario as $etapasForm)
                <h2>{{ $etapasForm->title }}</h2>
                <section style="width: 100%; height: 100%; overflow-y: scroll;">                                   
                        @csrf
                        <!-- Excepcion para el envio final del formulario -->                                
                        @if ($etapasForm->id == 6)
                        <div>
                        @include('municipio.finalizar')
                        </div>
                        @endif 
                        <!-- hasta aca tabla envio final del formulario -->
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
                                        @if($formrespuesta->formularios->id == 19)
                                            @php
                                            $funcion="onchange=ocultar_pregunta();";
                                            @endphp
                                        @else
                                            @php
                                            $funcion="";
                                            @endphp
                                        @endif
                                    <div class="form-group"> 
                                        <label for="singleselect">{{ $formrespuesta->formularios->label }}</label>
                                        <select class="form-select appearance-none
                                                        block
                                                        w-full
                                                        px-3
                                                        py-1.5
                                                        text-base
                                                        font-normal
                                                        text-gray-700
                                                        bg-white bg-clip-padding bg-no-repeat
                                                        border border-solid border-gray-300
                                                        rounded
                                                        transition
                                                        ease-in-out
                                                        m-0
                                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                                        id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}"  {{ $funcion }}
                                                        >
                                            @if($opcionesForm->isEmpty())
                                            <option value="0">Problemas al cargar opciones, contáctese con el administrador</option> 
                                            @else
                                            @php
                                            $seleccionado = "";
                                            @endphp
                                            <option value="">Seleccione</option>  
                                                @foreach ($opcionesForm as $option)                                              
                                                    @if ($option->id_formulario == $formrespuesta->formularios->id )  
                                                        @if( !is_null($formrespuesta->respuesta) or !empty($formrespuesta->respuesta) )                                                
                                                        <option @php if($option->opciones == $formrespuesta->respuesta){ echo 'selected="selected"'; } @endphp value="{{ $option->opciones }}"> {{ $option->opciones }} </option>
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
                                                                                
                                            @include('municipio.addPersonaDiscapacidad')

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
                                        <label>{{ $formrespuesta->formularios->label }}</label>
                                        @php
                                        $checked_checkbox = '';     
                                        @endphp                                    
                                        @foreach ($opcionesForm as $option)
                                        @if ($option->id_formulario == $formrespuesta->formularios->id )
                                            @php
                                            $check = explode(',',$formrespuesta->respuesta);                                            
                                            @endphp
                                            <div class="form-check">                                        
                                            <input @php
                                                if(in_array($option->id, $check)){ echo 'checked="checked"'; }
                                            @endphp class="form-check-input" type="checkbox" name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}[]" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}_{{$option->id}}" value="{{ $option->id }}" {{ $checked_checkbox }} >
                                            <label class="form-check-label" for="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}_{{$option->id}}">
                                                {{ $option->opciones }}
                                            </label>                                        
                                            </div>
                                            @endif
                                            @endforeach
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
    <script type="text/javascript">
    $( document ).ready(function() {
        $('#myModal').modal('toggle');
    });
    </script>  
@stop