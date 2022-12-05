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
        FormularioOption::create(['id_formulario' => 6, 'opciones'=>'El proceso de selección o concurso se declaró desierto']);
        FormularioOption::create(['id_formulario' => 6, 'opciones'=>'Había más de un postulante con discapacidad en la misma nómina final']);
        FormularioOption::create(['id_formulario' => 6, 'opciones'=>'La persona con discapacidad no estaba en igualdad de condiciones de mérito al resto de postulantes en la nómina final']);
        FormularioOption::create(['id_formulario' => 6, 'opciones'=>'Otro']);

        FormularioOption::create(['id_formulario' => 7, 'opciones'=>'Sí']);
        FormularioOption::create(['id_formulario' => 7, 'opciones'=>'No']);

        FormularioOption::create(['id_formulario' => 8, 'opciones'=>'Sí']);
        FormularioOption::create(['id_formulario' => 8, 'opciones'=>'No']);

        FormularioOption::create(['id_formulario' => 9, 'opciones'=>'Sí']);
        FormularioOption::create(['id_formulario' => 9, 'opciones'=>'No fueron solicitados por los o las postulantes']);
        FormularioOption::create(['id_formulario' => 9, 'opciones'=>'No se implementaron']);
        FormularioOption::create(['id_formulario' => 9, 'opciones'=>'No se dispone de esta información']);

        FormularioOption::create(['id_formulario' => 14, 'opciones'=>'Sí, 1 o más']);
        FormularioOption::create(['id_formulario' => 14, 'opciones'=>'No hubo contrataciones de personas con discapacidad ni asignatarias de pensión de invalidez en 2021']);
       
    }
}
