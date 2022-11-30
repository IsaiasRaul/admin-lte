@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @foreach ($munidata as $muni)
                    <h3 class="m-0">{{ $muni->nombre }} - {{ $muni->codigo }}</h3>
                    @endforeach
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
            <div id="wizard">
                @foreach ($etapasFormulario as $etapasForm)
                <h2>{{ $etapasForm->title }}</h2>
                <section>
                    <form id="enviar">
                        @foreach ($forms as $formrespuesta)
                            @if( $etapasForm->id == $formrespuesta->formularios->id_etapa_producto)
                                <div class="form-group col-md-12">
                                    <!-- Tipo input id 1: Text -->
                                    @if($formrespuesta->formularios->id_tipo_input == 1 )
                                        <div class="form-group"> 
                                        <label for="text">{{ $formrespuesta->formularios->label }}</label>
                                        <input type="text" class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}" 
                                            placeholder="{{ $formrespuesta->formularios->label }}" {{ $formrespuesta->formularios->requerido }} >
                                        </div>
                                    @endif
                                    
                                    <!-- Tipo input id 2: TextArea -->
                                    @if($formrespuesta->formularios->id_tipo_input == 2 )
                                    <div class="form-group"> 
                                    <label for="textarea">{{ $formrespuesta->formularios->label }}</label>
                                    <textarea class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                        name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                        aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}" rows="5"></textarea>
                                    </div>
                                    @endif

                                    <!-- Tipo input id 3: Select -->
                                    <!-- Por desarrollar: Obtener opciones de una tabla anexa. -->
                                    @if($formrespuesta->formularios->id_tipo_input == 3 )
                                    <div class="form-group"> 
                                        <label for="singleselect">{{ $formrespuesta->formularios->label }}</label>
                                        <select class="form-select" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                        </select>
                                    </div>
                                    @endif
                                    <!-- Tipo input id 4: Radio -->
                                    <!-- Por desarrollar: Obtener opciones de una tabla anexa. -->
                                    @if($formrespuesta->formularios->id_tipo_input == 4 )
                                    <fieldset class="form-group">
                                        <legend>{{ $formrespuesta->formularios->label }}</legend>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Default radio
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Default checked radio
                                        </label>
                                        </div>
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
                                    <input type="file" class="form-control-file" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                            aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}">
                                    <small id="fileupload" class="form-text text-muted"> Seleccione un archivo </small>
                                    </div>
                                    @endif        
                                    <!-- Tipo input id 7: email -->
                                    @if($formrespuesta->formularios->id_tipo_input == 7 )
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">{{ $formrespuesta->formularios->label }}</label>
                                        <input type="email" class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                name="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                aria-describedby="{{ $formrespuesta->formularios->aria_describedby }}">
                                        <div id="emailHelp" class="form-text">{{ $formrespuesta->formularios->aria_describedby }} </div>
                                    </div>
                                    @endif        

                                    <!-- Tipo input id 8: Multiselect -->
                                    <!-- Por desarrollar: Obtener opciones de una tabla anexa. -->
                                    @if($formrespuesta->formularios->id_tipo_input == 8 )
                                    <div class="form-group">
                                        <label for="multipleselect">{{ $formrespuesta->formularios->label }}</label>
                                        <select multiple class="form-control" id="{{ $formrespuesta->formularios->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        name="{{ $formulario->name }}_{{ $formrespuesta->formularios->id }}" 
                                                        aria-label="{{ $formrespuesta->formularios->aria_describedby }}">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
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
                                </div>
                            @endif    
                        @endforeach
                    </form>
                </section>
                @endforeach

            </div>
        </div>
    </div>
    <!-- /.content -->

@endsection

@section('js')
    <script> console.log('Hi!'); </script> 
@stop