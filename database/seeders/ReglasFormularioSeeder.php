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
        ReglasFormulario::create(['id_formulario' => '1', 'regla'=>'required|max:255']);
        ReglasFormulario::create(['id_formulario' => '2', 'regla'=>'required']);
    }
}
