@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('REPORTE ANUAL LEY 21.015') }}</h1>
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
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text" align="justify">
                                En el marco de la promulgación de la Ley Nº 21.015 del Ministerio de Desarrollo Social que incentiva la 
                                inclusión de personas con discapacidad al mundo laboral, se dicta el decreto Nº 65 del Ministerio del Trabajo y 
                                Previsión Social que Aprueba Reglamento del Artículo Nº 45 de la Ley Nº 20.422, que establece normas sobre 
                                igualdad de oportunidades e inclusión social de personas con discapacidad, para los órganos de la Administración del Estado.                                
                            </p>
                            <p class="card-text" align="justify">
                                Las instituciones públicas afectas a dicho reglamento deben reportar en enero de cada año, al Servicio Nacional de la Discapacidad y a 
                                la Dirección Nacional del Servicio Civil su cumplimiento respecto a los siguientes aspectos: 
                                <ul>
                                    <li>Selección preferente de personas con discapacidad</li>
                                    <li>Mantención y contratación de personas con discapacidad o asignatarias de pensión de invalidez de cualquier régimen previsional, exceptuando personal a honorarios.</li>
                                </ul>
                            </p>
                            <p class="card-text" align="justify">
                                <h2>PERSONAS A QUE REFIERE EL PRESENTE REGLAMENTO</h2>
                                Se entenderá por persona con discapacidad para los efectos del cumplimiento de esta Ley, aquella que cuente con:
                                <ul>
                                    <li>1. Calificación y Certificación de discapacidad otorgada por COMPIN.</li>
                                    <li>2. Registro Nacional de Discapacidad (RND) del Registro Civil.</li>
                                </ul>
                            </p>
                            <p class="card-text" align="justify">
                                Se entenderá persona asignataria de una pensión de invalidez de cualquier régimen previsional a aquella que cuente con:
                                <ul>
                                    <li>1. Pensión Básica Solidaria de Invalidez (PBSI), otorgada por el Estado (IPS)</li>
                                    <li>2. Pensión por enfermedades profesionales y accidentes del trabajo, Ley N° 16.744.</li>
                                    <li>3. Pensión de Invalidez entregada por las AFP o Antiguo sistema, Ley N° 3.500.</li>
                                </ul>                                
                            </p>
                            <p class="card-text" align="justify">
                                <h2>REPORTE DE MUNICIPALIDADES</h2>
                                Todas las Municipalidades están obligadas a informar anualmente al Servicio Nacional de la Discapacidad, 
                                el cumplimiento de la Ley 21.015, independiente de su dotación de personal.
                            </p>
                            <p class="card-text" align="justify">
                                Se sugiere que este reporte sea entregado por las áreas de Gestión y Desarrollo de Personas o Recursos Humanos de la Municipalidad.
                            </p>
                            <p class="card-text" align="justify">
                                Debe entregar un único reporte por Municipalidad que considere a todos los sectores de la gestión municipal, es decir, 
                                al municipio, educación y salud, siempre y cuando no sean corporaciones.
                            </p>
                            <p class="card-text" align="justify">
                                Las Corporaciones Municipales, al ser organismos privados, deben entregar su reporte 
                                en la plataforma de la Dirección del Trabajo en el siguiente portal: <a href="https://tramites.dirtrab.cl/registroempresa/" target="blank">https://tramites.dirtrab.cl/registroempresa/</a>
                            </p>
                            <p class="card-text" align="justify">
                                Los Servicios Locales de Educación Pública y el resto de los organismos de la Administración del 
                                Estado deben entregar su reporte a través de la plataforma del Servicio Civil <a href="https://reportabilidadgp.serviciocivil.cl" target="blank" >https://reportabilidadgp.serviciocivil.cl</a>
                            </p>
                            <p class="card-text" align="justify">
                                Ante cualquier duda, dirigirse al correo electrónico consultaleyinclusion@senadis.cl
                            </p>                                                 
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection