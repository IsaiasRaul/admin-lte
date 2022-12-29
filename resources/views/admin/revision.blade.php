@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                    <h3 class="m-0">Listado de Municipalidades Reportadas</h3>
                    
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
                        Ley 21015 Municipalidades
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
                        <th>Municipalidad</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrosForm as $registroForm)
                    <tr>                        
                        <td>{{ $registroForm->estados->estado }}</td>
                        <td>{{ $registroForm->convocatorias->nombre }}</td>
                        <td>{{ $registroForm->municipalidad->nombre }}</td>
                        <td>
                        @if ($registroForm->estados->id >= 5)
                        @csrf
                        <a href="{{ route('admin.formrevision',[$registroForm->id,$registroForm->id_convocatoria]) }}" class="dropdown-item">
                            <i class="mr-2 fas fa-sign-out-alt"></i>
                            {{ __('Revisar Formulario') }}
                        </a>                            
                        @else
                        @csrf
                        
                            <i class="fas fa-check-circle"></i>
                            {{ __('Formulario No enviado') }}
                       
                        @endif
                        </td>
                        <td>
                            @if ($registroForm->estados->id === 6)
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
        <div class="card-footer">
            {{ $registrosForm->links() }}
        </div>
    </div>
    <!-- /.content -->

@endsection

@section('script')
    <script> console.log('Hi!'); </script> 
@stop