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
        ReglasFormulario::create(['id_formulario' => '1', 'regla'=>'required|max:1000']);
        ReglasFormulario::create(['id_formulario' => '2', 'regla'=>'required|max:1000']);
        ReglasFormulario::create(['id_formulario' => '3', 'regla'=>'required|max:1000|email']);
        ReglasFormulario::create(['id_formulario' => '4', 'regla'=>'required']);

        /** MÓDULO 2: SELECCIÓN PREFERENTE */
        ReglasFormulario::create(['id_formulario' => '6', 'regla'=>'required|min:0']);
        ReglasFormulario::create(['id_formulario' => '7', 'regla'=>'required|min:0']);
        ReglasFormulario::create(['id_formulario' => '8', 'regla'=>'required']);
        ReglasFormulario::create(['id_formulario' => '9', 'regla'=>'required']);
        ReglasFormulario::create(['id_formulario' => '10', 'regla'=>'required']);
    }
}
