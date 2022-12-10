<?php

namespace Database\Seeders;

use App\Models\Formularios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etapa 1 - IDENTIFICACIÓN DEL INFORMANTE
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>1, 'id_etapa_producto'=>1, 'label'=>'Nombre de quien responde', 'name'=>'nombre_quien_responde', 'pattern'=>'Nombre de quien responde', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>1, 'id_etapa_producto'=>1, 'label'=>'Cargo', 'name'=>'cargo', 'pattern'=>'Cargo', 'requerido'=>'required', 'orden'=>2, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>7, 'id_etapa_producto'=>1, 'label'=>'Correo electrónico institucional', 'name'=>'correo_electronico_institucional', 'pattern'=>'Correo electrónico institucional', 'requerido'=>'required', 'orden'=>3, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10,'id_etapa_producto'=>1,'label'=>'Teléfono de contacto', 'name'=>'telefono_contacto', 'pattern'=>'Teléfono de contacto', 'requerido'=>'required', 'orden'=>4, 'activo' =>1]);
        
        //Etapa 2 - SELECCIÓN PREFERENTE
        Formularios::create(['id_producto' => 1, 
                             'id_tipo_input'=>11, 
                             'id_etapa_producto'=>2, 
                             'label'=>'La selección preferente debe ser aplicada por todos los órganos de la Administración del Estado, independiente de su dotación anual. Estas instituciones seleccionarán preferentemente, en igualdad de condiciones de mérito, a personas con discapacidad y/o asignatarias de pensión de invalidez. Se entenderá por igualdad de mérito la posición equivalente que ocupen dos o más postulantes como resultado de una evaluación basada en puntaje o bien la valoración objetiva utilizada al efecto. Para esta consulta no se considera personal a honorarios. Para poder dar cuenta de este aspecto, los procesos de selección deben contemplar la consulta a quienes postulan si tienen una discapacidad y/o si son asignatarios de pensión de invalidez, señalando que esto es en el marco de la Ley 21.015 y asegurando que esto no generará ninguna discriminación en el proceso. Todas las preguntas de este módulo se refieren al total de procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022.', 
                             'name'=>'label1', 
                             'pattern'=>'La selección preferente debe ser aplicada por todos los órganos de la Administración del Estado, independiente de su dotación anual. Estas instituciones seleccionarán preferentemente, en igualdad de condiciones de mérito, a personas con discapacidad y/o asignatarias de pensión de invalidez. Se entenderá por igualdad de mérito la posición equivalente que ocupen dos o más postulantes como resultado de una evaluación basada en puntaje o bien la valoración objetiva utilizada al efecto. Para esta consulta no se considera personal a honorarios.', 
                             'requerido'=>'required', 
                             'orden'=>5, 
                             'activo' =>1]);
        
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>2, 'label'=>'N° TOTAL DE PROCESOS DE SELECCIÓN para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_procesos_seleccion', 'pattern'=>'Número total de procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 'requerido'=>'required', 'orden'=>6, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>2, 'label'=>'N° TOTAL DE POSTULANTES en procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_postulantes', 'pattern'=>'Número total de postulantes en proceso de selección para contratas', 'requerido'=>'required', 'orden'=>7, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>2, 'label'=>'N° TOTAL DE POSTULANTES CON DISCAPACIDAD Y/O ASIGNATARIOS/AS DE PENSIÓN DE INVALIDEZ en procesos de selección para contratas, código del trabajo y/o concursos de planta durante el periodo enero - diciembre 2022', 'name'=>'total_postulantes_discapacidad', 'pattern'=>'Número total de postulantes con discapacidad', 'requerido'=>'required', 'orden'=>8, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>2, 'label'=>'N° TOTAL DE POSTULANTES CON DISCAPACIDAD Y/O ASIGNATARIOS/AS DE PENSIÓN DE INVALIDEZ QUE FUERON PARTE DE UNA NÓMINA DE FINALISTAS en procesos de selección y/o concursos desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_postulantes_discapacidad_pension', 'pattern'=>'Número total de postulantes con discapacidad y/o asignatarios de pensión de invalidez', 'requerido'=>'required', 'orden'=>9, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>2, 'label'=>'N° TOTAL DE PERSONAS CON DISCAPACIDAD Y/O ASIGNATARIOS/AS DE PENSIÓN DE INVALIDEZ QUE FUERON SELECCIONADAS durante el periodo enero - diciembre 2022', 'name'=>'total_personas_disc_invalidez_seleccionadas', 'pattern'=>'Número total de personas con discapacidad y/o asignatarias de pensión de invalidez que hayan sido seleccionada', 'requerido'=>'required', 'orden'=>10, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>8, 'id_etapa_producto' =>2, 'label'=>'En caso de no haber seleccionado a todas las personas con discapacidad y/o asignatarias de pensión de invalidez que fueron parte de nóminas ﬁnales en el año 2022, indicar el motivo. [Selecciona todos los que corresponda]', 'name'=>'motivo_no_seleccion', 'pattern'=>'En caso de no haber seleccionado a todas las personas con discapacidad y/o asignatarias de pensión de invalidez que fueron parte de nóminas ﬁnales en el año 2022, indicar el motivo.', 'requerido'=>'required', 'orden'=>11, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>2, 'id_etapa_producto' =>2, 'label'=>'Si tiene algún comentario respecto a la selección preferente señalar a continuación', 'name'=>'comentarios_seleccion_preferente','pattern'=>'Tiene algún comentario respecto a la selección preferente', 'requerido'=>'required', 'orden'=>12, 'activo' =>1]);

        //Etapa 3 - MEDIDAS DE ACCESIBILIDAD EN PROCESOS DE SELECCIÓN
        Formularios::create(['id_producto' => 1, 
                             'id_tipo_input'=>11, 
                             'id_etapa_producto'=>3, 
                             'label'=>'El artículo 7 del Reglamento establece una serie de obligaciones de los servicios en relación con la implementación de adaptaciones y ajustes necesarios para permitir la participación de las personas con discapacidad en los procesos de selección en igualdad de oportunidades. Por ello, a partir de 2022 se han incluido preguntas adicionales que recogen este aspecto. Todas las preguntas de este módulo se refieren al total de procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 
                             'name'=>'label2', 
                             'pattern'=>'El artículo 7 del Reglamento establece una serie de obligaciones de los servicios en relación con la implementación de adaptaciones y ajustes necesarios para permitir la participación de las personas con discapacidad en los procesos de selección en igualdad de oportunidades. Por ello, a partir de 2022 se han incluido preguntas adicionales que recogen este aspecto. Todas las preguntas de este módulo se refieren al total de procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 
                             'requerido'=>'required', 
                             'orden'=>13, 
                             'activo' =>1]);

        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto' =>3, 'label'=>'¿Durante el año 2022, la institución contó con un procedimiento para identificar las necesidades de ajustes y apoyos de las personas con discapacidad para participar en los procesos de selección? (Como una consulta a través de formulario de postulación, un protocolo interno u otro)', 'name'=>'procedimiento_identificacion_necesidades','pattern'=>'¿Durante el año 2022, la institución contó con un procedimiento para identificar las necesidades de ajustes y apoyos de las personas con discapacidad para participar en los procesos de selección? (Como una consulta a través de formulario de postulación, un protocolo interno u otro)', 'requerido'=>'required', 'orden'=>14, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto' =>3, 'label'=>'¿El sitio web en el cuales se publicaron las convocatorias a los procesos de selección durante 2022 ha aprobado con carácter AA o AAA algún validador de accesibilidad web con conformidad a la norma W3C de accesibilidad web?', 'name'=>'norma_accesibilidad','pattern'=>'¿El sitio web en el cuales se publicaron las convocatorias a los procesos de selección durante 2022 ha aprobado con carácter AA o AAA algún validador de accesibilidad web con conformidad a la norma W3C de accesibilidad web?', 'requerido'=>'required', 'orden'=>15, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto' =>3, 'label'=>'Con qué medidas de accesibilidad contó el formulario de postulación utilizado en los procesos de selección y/o concursos desarrollados en 2022:', 'name'=>'medidas_accesibilidad_form','pattern'=>'Con qué medidas de accesibilidad contó el formulario de postulación utilizado en los procesos de selección y/o concursos desarrollados en 2022:', 'requerido'=>'required', 'orden'=>16, 'activo' =>1]);

        //Etapa 4 - MANTENCIÓN Y CONTRATACIÓN DE PERSONAS CON DISCAPACIDAD O ASIGNATARIAS DE PENSIÓN DE INVALIDEZ
        Formularios::create(['id_producto' => 1, 
                             'id_tipo_input'=>11, 
                             'id_etapa_producto'=>4, 
                             'label'=>'La Ley 21.015 establece que en los órganos de la Administración del Estado que tengan una dotación anual de 100 o más trabajadores, a lo menos un 1% de su dotación anual deberán ser personas con discapacidad o asignatarias de una pensión de invalidez de cualquier régimen previsional (no se considera personal a honorarios). Si su dotación máxima para el 2022 fue menor a 100 trabajadores, le solicitamos ingresar la información de igual manera, aun cuando se entiende que no está obligada a dar cumplimiento a la mantención y contratación de un 1% de personas con discapacidad y/o asignatarias de pensión de invalidez. Si el resultado del cálculo del porcentaje de contratación de personas con discapacidad resulta un número con decimales, se aproximará al entero inferior.', 
                             'name'=>'label3', 
                             'pattern'=>'La Ley 21.015 establece que en los órganos de la Administración del Estado que tengan una dotación anual de 100 o más trabajadores, a lo menos un 1% de su dotación anual deberán ser personas con discapacidad o asignatarias de una pensión de invalidez de cualquier régimen previsional (no se considera personal a honorarios). Si su dotación máxima para el 2022 fue menor a 100 trabajadores, le solicitamos ingresar la información de igual manera, aun cuando se entiende que no está obligada a dar cumplimiento a la mantención y contratación de un 1% de personas con discapacidad y/o asignatarias de pensión de invalidez. Si el resultado del cálculo del porcentaje de contratación de personas con discapacidad resulta un número con decimales, se aproximará al entero inferior.', 
                             'requerido'=>'required', 
                             'orden'=>17, 
                             'activo' =>1]);

        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>4, 'label'=>'Indique dotación máxima para el año 2022', 'name'=>'dotacion_maxima', 'pattern'=>'Indique dotación máxima para el año 2022', 'requerido'=>'required', 'orden'=>18, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3,  'id_etapa_producto'=>4, 'label'=>'De acuerdo a lo señalado anteriormente ¿hubo personas con discapacidad y/o asignatarias de pensión de invalidez con contrato vigente en el 2022?', 'name'=>'personas_discapacidad_contrato_vigente', 'pattern'=>'De acuerdo a lo señalado anteriormente ¿hubo personas con discapacidad y/o asignatarias de pensión de invalidez con contrato vigente en el 2022?', 'requerido'=>'required', 'orden'=>19, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>11, 'id_etapa_producto'=>4, 'label'=>'Detalle de personas con discapacidad y/o asignatarias de pensión de invalidez', 'name'=>'detalle_personas_discapacidad', 'pattern'=>'Detalle de personas con discapacidad y/o asignatarias de pensión de invalidez', 'requerido'=>'required', 'orden'=>20, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>2,  'id_etapa_producto'=>4, 'label'=>'Si tiene algún comentario respecto respecto a la mantención y contratación, lo puede señalar a continuación', 'name'=>'comentario_mantencion_contratacion','pattern'=>'Tiene algún comentario respecto a la mantención y contratación, lo puede señalar a continuación', 'requerido'=>'required', 'orden'=>21, 'activo' =>1]);
        
        //Etapa 5 - DIFUSIÓN INFORMES PERÍODO ANTERIOR REPORTADO
        Formularios::create(['id_producto' => 1, 
                             'id_tipo_input'=>11, 
                             'id_etapa_producto'=>5, 
                             'label'=>'El reglamento de la Ley 21.015 establece que las instituciones públicas deberán publicar el informe de cumplimiento de selección preferente y de mantención y contratación de cada año, en la página web institucional dentro de los 30 días siguientes a su emisión. Asimismo, establece que en aquellos casos de instituciones que presenten sus razones fundadas por incumplimiento de la cuota de contratación dentro del mes de abril, éstas deberán publicar dicho informe en las páginas web institucionales dentro del mes siguiente a su emisión.', 
                             'name'=>'informe_cumplimiento', 
                             'pattern'=>'El reglamento de la Ley 21.015 establece que las instituciones públicas deberán publicar el informe de cumplimiento de selección preferente y de mantención y contratación de cada año, en la página web institucional dentro de los 30 días siguientes a su emisión. Asimismo, establece que en aquellos casos de instituciones que presenten sus razones fundadas por incumplimiento de la cuota de contratación dentro del mes de abril, éstas deberán publicar dicho informe en las páginas web institucionales dentro del mes siguiente a su emisión.', 
                             'requerido'=>'required', 
                             'orden'=>22, 
                             'activo' =>1]);
        
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto'=>5, 'label'=>'El informe de cumplimiento de selección preferente y cuota de contratación correspondiente al año 2021 ¿Se publicó en el sitio web institucional de la Municipalidad dentro de los 30 días posteriores a la emisión del informe?', 'name'=>'informe_cumplimiento', 'pattern'=>'El informe de cumplimiento de selección preferente y cuota de contratación correspondiente al año 2021 ¿Se publicó en el sitio web institucional de la Municipalidad dentro de los 30 días posteriores a la emisión del informe?', 'requerido'=>'required', 'orden'=>23, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto'=>5, 'label'=>'El informe de razones fundadas en caso de que haya presentado excusas por incumplimiento de la cuota de contratación correspondiente al año 2021 ¿Se publicó en el sitio web institucional de la Municipalidad dentro de los 30 días posteriores a la emisión del informe?', 'name'=>'informe_razones_fundadas', 'pattern'=>'El informe de razones fundadas en caso de que haya presentado excusas por incumplimiento de la cuota de contratación correspondiente al año 2021 ¿Se publicó en el sitio web institucional de la Municipalidad dentro de los 30 días posteriores a la emisión del informe?', 'requerido'=>'required', 'orden'=>24, 'activo' =>1]);

        //Etapa 6 - Difusión Informe Previo
    }
}
