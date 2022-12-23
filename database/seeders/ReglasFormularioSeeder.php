<?php

namespace Database\Seeders;

use App\Models\ReglasFormulario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReglasFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**gt - greater than
            gte - greater than equal to
            lt - less than
            lte - less than equal to
        */

        /** MÓDULO 1: IDENTIFICACIÓN DEL INFORMANTE */
        ReglasFormulario::create(['id_formulario' => '1', 'regla'=>'required|max:1000']); //1
        ReglasFormulario::create(['id_formulario' => '2', 'regla'=>'required|max:1000']); //2
        ReglasFormulario::create(['id_formulario' => '3', 'regla'=>'required|max:1000|email']); //3
        ReglasFormulario::create(['id_formulario' => '4', 'regla'=>'required']); //4

        /** MÓDULO 2: SELECCIÓN PREFERENTE */
        ReglasFormulario::create(['id_formulario' => '6', 'regla'=>'required|min:0']); //5
        ReglasFormulario::create(['id_formulario' => '7', 'regla'=>'required|min:0']); //6
        ReglasFormulario::create(['id_formulario' => '8', 'regla'=>'required|min:0|lte:total_postulantes_7']); //7
        ReglasFormulario::create(['id_formulario' => '9', 'regla'=>'required|min:0|lte:total_postulantes_discapacidad_8']); //8
        ReglasFormulario::create(['id_formulario' => '10','regla'=>'required|min:0|lte:total_postulantes_discapacidad_pension_9']); //9
        ReglasFormulario::create(['id_formulario' => '12','regla'=>'max:350']); //10
        
        /** MÓDULO 3 - MEDIDAS DE ACCESIBILIDAD EN PROCESOS DE SELECCIÓN */
        ReglasFormulario::create(['id_formulario' => '14','regla'=>'required']); //11
        ReglasFormulario::create(['id_formulario' => '15','regla'=>'required']); //12
        ReglasFormulario::create(['id_formulario' => '16','regla'=>'required']); //13

        /** MÓDULO 4 - MANTENCIÓN Y CONTRATACIÓN DE PERSONAS CON DISCAPACIDAD O ASIGNATARIAS DE PENSIÓN DE INVALIDEZ */
        ReglasFormulario::create(['id_formulario' => '18','regla'=>'required']); //14
        ReglasFormulario::create(['id_formulario' => '19','regla'=>'required']); //15
        ReglasFormulario::create(['id_formulario' => '21','regla'=>'required|max:350']); //16

        /** MÓDULO 5 - MANTENCIÓN Y CONTRATACIÓN DE PERSONAS CON DISCAPACIDAD O ASIGNATARIAS DE PENSIÓN DE INVALIDEZ */
        ReglasFormulario::create(['id_formulario' => '23','regla'=>'required']); //17
        ReglasFormulario::create(['id_formulario' => '24','regla'=>'required']); //18
    }
}
