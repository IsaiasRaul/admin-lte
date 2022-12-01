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
        Formularios::create(['id_producto' => 1, 'id_tipo_input'=>10, 'id_etapa_producto'=>1, 'label'=>'N° total de procesos de selección para contratas, código del trabajo y/o concursos de planta desarrollados durante el periodo enero - diciembre 2022', 'name'=>'total_procesos_seleccion', 'pattern'=>'Número total de procesos de selección para contratas', 'requerido'=>'required', 'orden'=>1, 'activo' =>1]);
    }
}
