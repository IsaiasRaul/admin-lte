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
        //Etapa 1 - Seleccion Preferente
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>1, 'label'=>'N° total de procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_procesos_seleccion', 'pattern'=>'Número total de procesos de selección para contratas', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>1, 'label'=>'N° total de postulantes en procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_postulantes', 'pattern'=>'Número total de postulantes en proceso de selección para contratas', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>1, 'label'=>'N° total de postulantes con discapacidad y/o asignatarios de pensión de invalidez en procesos de selección para contratas, código del trabajo y/o concursos de planta durante el periodo enero - diciembre 2022', 'name'=>'total_postulantes_discapacidad', 'pattern'=>'Número total de postulantes con discapacidad', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>1, 'label'=>'N° total de postulantes con discapacidad y/o asignatarios de pensión de invalidez que hayan formado parte de una nómina de finalistas en procesos de selección y/o concursos desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_postulantes_discapacidad_pension', 'pattern'=>'Número total de postulantes con discapacidad y/o asignatarios de pensión de invalidez', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>1, 'label'=>'N° total de personas con discapacidad y/o asignatarias de pensión de invalidez que hayan sido seleccionadas durante el periodo enero - diciembre 2022', 'name'=>'total_personas_disc_invalidez_seleccionadas', 'pattern'=>'Número total de personas con discapacidad y/o asignatarias de pensión de invalidez que hayan sido seleccionada', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto'=>1, 'label'=>'En caso de no haber seleccionado a todas las personas con discapacidad y/o asignatarias de pensión de invalidez que fueron parte de nóminas ﬁnales en el año 2022, indicar el motivo', 'name'=>'motivo_no_seleccion', 'pattern'=>'En caso de no haber seleccionado a todas las personas con discapacidad y/o asignatarias de pensión de invalidez que fueron parte de nóminas ﬁnales en el año 2022, indicar el motivo.', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>4, 'id_etapa_producto'=>1, 'label'=>'¿En los procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022 se consultó a las personas postulantes los ajustes necesarios y/o ayudas técnicas que requieren para participar en el proceso de selección?', 'name'=>'ajustes_necesarios_ayudas_tecnicas', 'pattern'=>'se consultó a las personas postulantes los ajustes necesarios y/o ayudas técnicas que requieren para participar en el proceso de selección', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto'=>1, 'label'=>'¿En los procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022 donde hubo postulantes con discapacidad o asignatarios de pensión de invalidez, se implementaron las adaptaciones y ajustes necesarios, de conformidad a lo que establece el artículo 24 de la Ley 20.422, y/o se proporcionaron los servicios de apoyo y/o ayudas técnicas que fueron solicitadas?', 'name'=>'implementacion_adpataciones', 'pattern'=>'se implementaron las adaptaciones y ajustes necesarios, de conformidad a lo que establece el artículo 24 de la Ley 20.422', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>3, 'id_etapa_producto'=>1, 'label'=>'¿Los sistemas y sitios web en los cuales se publicaron las convocatorias a los procesos de selección para contratas, código del trabajo y/o  concursos de planta desarrollados durante el periodo enero - diciembre 2022 cumplen con los estándares de desarrollo, compatibilidad y accesibilidad universal de conformidad a lo establecido en el decreto Supremo N°1 de 2015 del Ministerio Secretaría General de la Presidencia que “Aprueba norma técnica sobre sistemas y sitios web de los órganos de la administración del Estado”', 'name'=>'sitios_cumplen_estandares', 'pattern'=>'Sitios y sitemas cumplen con los estándares de desarrollo, compatibilidad y accesibilidad universal de conformidad a lo establecido en el decreto Supremo N°1 de 2015 del Ministerio Secretaría General de la Presidencia ', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>2, 'id_etapa_producto'=>1, 'label'=>'Si tiene algún comentario respecto a la selección preferente señalar a continuación', 'name'=>'comentarios_seleccion_preferente','pattern'=>'Tiene algún comentario respecto a la selección preferente', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
    }
}
