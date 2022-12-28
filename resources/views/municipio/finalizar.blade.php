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
                                <p align="justify">Institución no obligada a cumplir cuota de contratación de personas con discapacidad o asignatarias de pensión de invalidez</p>
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
                                    <td><p align="justify">Cumple cuota de contratación</p></td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 2)
                                    <td><p align="justify">No cumple cuota de contratación</p></td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 3)
                                    <td><p align="justify"> Cumple no obligada</p></td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 4)
                                    <td><p align="justify">No obligada</p></td>
                                    @elseif( $item4->resultado_pre_couta_contratacion == 5)
                                    <td><p align="justify">Falta información</p></td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>(E) Cumplimiento Global Ley 21.015 (preliminar)</td>
                                @foreach($validacionfinal as $item5)
                                    @if( $item5->cumplimiento_global == 1)
                                    <td>
                                        <p align="justify">
                                            Cumple selección preferente y cuota de contratación (Obligada): 
                                            La Municipalidad declara cumplir con las obligaciones de selección preferente y de mantención y 
                                            contratación de personas con discapacidad y/o asignatarias de pensión de invalidez en 2022, 
                                            estando obligada por tener una dotación de 100 o más funcionarios/trabajadores.
                                        </p>
                                    </td>    
                                    @elseif($item5->cumplimiento_global == 2)
                                    <td>
                                        <p align="justify">
                                            Cumple selección preferente y cuota de contratación (No obligadas): 
                                            La Municipalidad declara cumplir con las obligaciones de selección preferente y de mantención y 
                                            contratación de personas con discapacidad y/o asignatarias de pensión de invalidez en 2022, 
                                            no estando obligada por tener una dotación inferior a 100 funcionarios/trabajadores.
                                        </p>    
                                    </td>
                                    @elseif($item5->cumplimiento_global == 3)
                                    <td>
                                        <p align="justify">
                                            Cumple no obligada: Informa y no aplica selección preferente, ni cuota de contratación: La Municipalidad declara no haber 
                                            aplicado selección preferente y ni cumplir la cuota de contratación de personas con discapacidad y/o 
                                            asignatarias de pensión de invalidez en 2022, no estando obligada por tener una dotación inferior a 100 funcionarios/trabajadores.
                                        </p>
                                    </td>
                                    @elseif($item5->cumplimiento_global == 4)
                                    <td>
                                        <p align="justify">
                                            En cumplimiento de selección preferente, no cumple cuota de contratación, debe presentar excusas: 
                                            La Municipalidad declara cumplir con la obligación de selección preferente, pero declara no cumplir la mantención y contratación de personas 
                                            con discapacidad y/o asignatarias de pensión de invalidez en 2022.
                                        </p>
                                        <p align="justify">
                                            De acuerdo al Reglamento para el sector público, las instituciones que no hayan dado cumplimiento a la cuota de contratación del 1% de 
                                            personas con discapacidad y/o asignatarias de pensión de invalidez, deberán excusarse por razones fundadas. 
                                            Para ello, la Alcaldesa o Alcalde, deberá presentar un informe fundado entre el 03 de abril de 2022 y el 28 de abril de 2023. <br>
                                            A dicho proceso se podrá acceder a través de sistema de reportabilidad ley21015.senadis.cl
                                        </p>
                                    </td>
                                    @elseif($item5->cumplimiento_global == 5)
                                    <td>
                                        <p align="justify">
                                            <b>No Cumple selección preferente, cumple cuota de contratación: </b> 
                                            La Municipalidad declara cumplir con la obligación de mantención y contratación, 
                                            pero declara no cumplir la selección preferente de personas con discapacidad y/o
                                            asignatarias de pensión de invalidez en 2022.
                                        </p>
                                    </td>
                                    @elseif($item5->cumplimiento_global == 6)
                                    <td>
                                        <p align="justify">
                                            La Municipalidad no entrega suficiente información para determinar si se cumplió o no con la 
                                            selección preferente y/o con la mantención y contratación de personas con 
                                            discapacidad y/o asignatarias de pensión de invalidez en 2022.
                                        </p>
                                        <p align="justify">
                                            De acuerdo al Reglamento para el sector público, las instituciones que no hayan dado cumplimiento a la 
                                            cuota de contratación del 1% de personas con discapacidad y/o asignatarias de pensión de invalidez, 
                                            deberán excusarse por razones fundadas. Para ello, la Alcaldesa o Alcalde,  
                                            deberá presentar un informe fundado entre el 03 de abril de 2023 y el 28 de abril de 2023.
                                        </p>
                                    </td>                                
                                    @endif
                                @endforeach
                            </tr>                                                                                                                       

                            </tbody>
                    </table>       
                        
                </div>
            </div>
        </div>
    </div>    
</div>