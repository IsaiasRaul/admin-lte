<div id="finaliza">
    <div class="container">
        <div id="tabla">
            <div class="row">
                <div class="col-sm-12">
                <h4>Resumen Formulario</h4>
                </div>
                <div class="col-sm-12">
                    <h6>
                    <p align="justify">
                        Al dar respuesta a la presente consulta se entiende por reportada la información al Servicio Nacional de la Discapacidad y a la Dirección Nacional del Servicio Civil, ya que ambas instituciones trabajan de forma coordinada en este proceso.<br>
                        De acuerdo al Reglamento para el sector público, los organismos que no cumplan, o cumplan parcialmente, con la cuota contratación de un 1% de personas con discapacidad y/o asignatarias de pensión de invalidez, podrán excusarse por razones fundadas.<br>
                        Para excusarse, la jefatura de servicio deberá presentar un informe fundado durante el mes de abril en esta misma plataforma. <br>
                        Según lo declarado por su Municipalidad sus resultados preliminares son los siguientes:
                    </p>
                    </h6>
                </div>
                <div>
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>Módulo</th>
                                <th>Restricciones</th>
                            </tr>
                        </thead>
                        @csrf
                        <tbody id="DataResultFinal">
                            <tr>
                                <td>(A) Cumplimiento selección preferente (resultado preliminar)</td>
                                @foreach ($validacionfinal as $item)
                                <td>
                                    
                                    @if($item->cumple_seleccion_preferente === 1)
                                    <p>La Municipalidad declara que sí aplicó la selección preferente al haber contratado a todas las personas con discapacidad y/o asignatarias de pensión de invalidez que llegaron a nóminas finales en 2022</p>
                                    @elseif($item->cumple_seleccion_preferente === 2)
                                    <p>La Municipalidad declara que no fue posible aplicar la selección preferente al no haber personas con discapacidad y/o asignatarios/as de pensión de invalidez en nóminas finales en 2022</p>
                                    @elseif($item->cumple_seleccion_preferente === 3)
                                    <p>No cumple selección preferente</p>
                                    @elseif($item->cumple_seleccion_preferente === 4)
                                    <p>Falta información: Su respuesta debe ser revisada.</p>
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>(B) 1% de la dotación máxima en 2022</td>
                                @foreach ($validacionfinal as $item2)
                                <td>
                                {{$item2->unoporciento}}
                                @if($item2->cumple_porcentaje_dotacion_max === 3)
                                <p>Institución no obligada a cumplir cuota de contratación de personas con discapacidad o asignatarias de pensión de invalidez</p>
                                @endif
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>(C) Cuota de contratación de personas con discapacidad</td>
                                @foreach ($validacionfinal as $item3)
                                <td>{{$item3->cuota_contratacion}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>(D) Resultado preliminar cuota de contratación</td>
                                @foreach($validacionfinal as $item4)
                                    @if( $item4->resultado_pre_couta_contratacion == 1)
                                    <td>Cumple cuota de contratación</td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 2)
                                    <td>No cumple cuota de contratación</td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 3)
                                    <td> Cumple no obligada</td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 4)
                                    <td>No obligada</td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 5)
                                    <td>Falta información</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>(E) Cumplimiento Global Ley 21.015 (preliminar)</td>
                                <td>RESULTADO</td>
                            </tr>                                                                                                                       

                            </tbody>
                    </table>       
                        
                </div>
            </div>
        </div>
    </div>    
</div>