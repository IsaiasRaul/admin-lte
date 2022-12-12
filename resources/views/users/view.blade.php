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
                        Lista de Usuarios Ley 21.015
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="flex items-center flex-grow gap-4">
            <form action="{{ route('users.show') }}" class="flex-grow" method="GET">
                <div class="container-1"> 
                <span class="icon"><i class="fa fa-search"></i></span>
                <input type="text" name="search" placeholder="Buscar Nombre" value="{{ request('search') }}" 
                class="border-2 border-teal-900 rounded py-2 px-4 w-1/2"
                >
                </div>
            </form>
        </div>        

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Municipalidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->municipalidades->nombre }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
    <!-- /.content -->

@endsection

@section('js')
    <script> console.log('Hi!'); </script> 
@stop