@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    Formulario Reporte Ley 21.015
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
                        <h3 class="m-0">Municipalidad: Ley 21015 Municipalidades - {{ $muni->nombre }}</h3>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        <div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Convocatoria</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrosForm as $registroForm)
                    <tr>                        
                        <td>{{ $registroForm->estados->estado }}</td>
                        <td>{{ $registroForm->convocatorias->nombre }}</td>
                        <td>
                        @if ($estado_actual !== 5)
                        @csrf
                        <a href="{{ route('form.respuesta',[$registroForm->id,$registroForm->id_convocatoria]) }}" class="dropdown-item">
                            <i class="mr-2 fas fa-sign-out-alt"></i>
                            {{ __('Responder Formulario') }}
                        </a>                            
                        @else
                        @csrf
                        
                            <i class="fas fa-check-circle"></i>
                            {{ __('Formulario Enviado') }}
                       
                        @endif
                        </td>
                        <td>
                            @if ($estado_actual === 6)
                            @csrf
                            <a href="#" class="dropdown-item">                                
                                <p class="text-warning">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ __('Razones Fundadas') }}
                                </p>
                            </a>
                            @else                            
                            <p class="text-secondary"><i class="fa-solid fa-triangle-exclamation"></i>{{ __('Razones Fundadas') }}</p>
                            @endif
                        </td>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
    
        </div>
    </div>
    <!-- /.content -->

    <!-- modal del texto cuando finaliza el envio -->
    <div id="myModalFinal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">FORMULARIO ENVIADO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p align="justify">
                        Al dar respuesta a la presente consulta se entiende por reportada la información al Servicio Nacional de la Discapacidad y 
                        a la Dirección Nacional del Servicio Civil, ya que ambas instituciones trabajan de forma coordinada en este proceso.
                    </p>
                    <p align="justify">
                        De acuerdo al Reglamento para el sector público, los organismos que no cumplan, o 
                        cumplan parcialmente, con la cuota contratación de un 1% de personas con discapacidad y/o asignatarias 
                        de pensión de invalidez, podrán excusarse por razones fundadas.
                    </p> 
                    <p align="justify">
                        Para excusarse, la jefatura de servicio deberá presentar 
                        un informe fundado entre el 03 de abril y el 28 de abril 
                        del 2023, a través de esta plataforma.
                    </p>
                </div>
            </div>
        </div>
    </div>    
    <!-- modal del texto cuando finaliza el envio -->

@endsection

@section('scripts')
    <script> console.log('Hi!'); </script> 
    @if ($option_envio_final == true)
    <script type="text/javascript">    
        $( document ).ready(function() {
            $('#myModalFinal').modal('toggle');
        });
    </script>        
    @endif

@stop