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
                            @csrf
                            <a href="{{ route('form.respuesta',[$registroForm->id,$registroForm->id_convocatoria]) }}" class="dropdown-item">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Responder Formulario') }}
                            </a>
                        </td>
                        <td>
                            @csrf
                            <a href="#" class="dropdown-item">                                
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ __('Responder Observación') }}
                            </a>
                        </td>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
    
        </div>
    </div>
    <!-- /.content -->

@endsection

@section('js')
    <script> console.log('Hi!'); </script> 
@stop