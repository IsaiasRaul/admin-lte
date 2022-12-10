<?php

namespace Database\Seeders;

use App\Models\FormularioOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormularioOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        FormularioOption::create(['id_formulario' => 11, 'opciones'=>'El proceso de selección y/o concurso se declaró desierto']);
        FormularioOption::create(['id_formulario' => 11, 'opciones'=>'Había más de un postulante con discapacidad en la misma nómina final']);
        FormularioOption::create(['id_formulario' => 11, 'opciones'=>'La persona con discapacidad no estaba en igualdad de condiciones de mérito al resto de postulantes en la nómina final']);
        FormularioOption::create(['id_formulario' => 11, 'opciones'=>'Otro']);
        
        FormularioOption::create(['id_formulario' => 14, 'opciones'=>'Sí, en todos los procesos de selección y/o concursos']);
        FormularioOption::create(['id_formulario' => 14, 'opciones'=>'Sí, en algunos de los procesos de selección y/o concursos']);
        FormularioOption::create(['id_formulario' => 14, 'opciones'=>'No']);

        FormularioOption::create(['id_formulario' => 15, 'opciones'=>'Ningún proceso de selección desarrollado en 2022 se publicó en un sitio web']);
        FormularioOption::create(['id_formulario' => 15, 'opciones'=>'Sí ha aprobado validador']);
        FormularioOption::create(['id_formulario' => 15, 'opciones'=>'No ha aprobado validador']);

        FormularioOption::create(['id_formulario' => 16, 'opciones'=>'Se puede descargar en formato apto para lectores de pantalla: PDF accesible o word']);
        FormularioOption::create(['id_formulario' => 16, 'opciones'=>'Es un formulario online que ha aprobado un validador de accesibilidad en conformidad a la norma W3C']);
        FormularioOption::create(['id_formulario' => 16, 'opciones'=>'Cuenta con otra medida de accesibilidad']);
        
        FormularioOption::create(['id_formulario' => 19, 'opciones'=>'Sí, 1 o más']);
        FormularioOption::create(['id_formulario' => 19, 'opciones'=>'No hubo contrataciones de personas con discapacidad ni asignatarias de pensión de invalidez en 2022']);
        
        FormularioOption::create(['id_formulario' => 23, 'opciones'=>'Sí se publicó dentro de plazo']);
        FormularioOption::create(['id_formulario' => 23, 'opciones'=>'Sí se publicó fuera de plazo']);
        FormularioOption::create(['id_formulario' => 23, 'opciones'=>'No se publicó']);
        FormularioOption::create(['id_formulario' => 23, 'opciones'=>'No se envió informe de cumplimiento de Ley 21.015 correspondiente a 2021']);
        
        FormularioOption::create(['id_formulario' => 24, 'opciones'=>'No se presentaron razones fundadas']);
        FormularioOption::create(['id_formulario' => 24, 'opciones'=>'Sí se publicó dentro de plazo']);
        FormularioOption::create(['id_formulario' => 24, 'opciones'=>'Sí se publicó fuera de plazo']);
        FormularioOption::create(['id_formulario' => 24, 'opciones'=>'No se publicó']);
        
       
    }
}
