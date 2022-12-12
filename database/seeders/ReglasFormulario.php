<?php

namespace Database\Seeders;

use App\Models\ReglasFormulario as ModelsReglasFormulario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReglasFormulario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsReglasFormulario::create(['id_formulario' => '1', 'regla'=>'required|max:255']);
        ModelsReglasFormulario::create(['id_formulario' => '2', 'regla'=>'required']);
    }
}
