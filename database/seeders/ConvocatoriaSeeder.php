<?php

namespace Database\Seeders;

use App\Models\Convocatorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convocatorias::create(['nombre' => 'Formulario 2022', 'fecha_inicio'=>'2022-11-29 00:00:00', 'fecha_fin'=>'2023-03-31 23:59:59', 'activo'=>1]);
    }
}
