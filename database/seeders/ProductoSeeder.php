<?php

namespace Database\Seeders;

use App\Models\Productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::create(['producto' => 'Reporte Ley 21.015 - Municipalidades 2022', 'descripcion'=>'De acuerdo a la Ley N°21.015 y su Reglamento para el sector público, los organismos de la Administración del Estado deben reportar su cumplimiento en enero de cada año respecto a los siguientes aspectos']);
    }
}
