@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                    <h3 class="m-0">Listado de Municipalidades</h3>
                    
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
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Activo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($munis as $muni)
                    <tr>
                        <td>{{ $muni->nombre }}</td>
                        <td>{{ $muni->codigo }}</td>
                        <td>{{ $muni->activo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
        <div class="card-footer">
            {{ $munis->links() }}
        </div>
    </div>
    <!-- /.content -->

@endsection

@section('js')
    <script> console.log('Hi!'); </script> 
@stop