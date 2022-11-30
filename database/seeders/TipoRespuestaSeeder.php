<?php

namespace Database\Seeders;

use App\Models\TipoRespuestas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoRespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoRespuestas::create(['descripcion' => 'Encuesta', 'activo'=>1]);
        TipoRespuestas::create(['descripcion' => 'Observacion', 'activo'=>1]);
    }
}
