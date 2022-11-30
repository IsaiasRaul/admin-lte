<?php

namespace Database\Seeders;

use App\Models\Estados;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estados::create(['estado' => 'Creado', 'activo'=>1]);
        Estados::create(['estado' => 'Iniciado', 'activo'=>1]);
        Estados::create(['estado' => 'En Proceso', 'activo'=>1]);
        Estados::create(['estado' => 'Completado', 'activo'=>1]);
        Estados::create(['estado' => 'Finalizado/Enviado', 'activo'=>1]);
    }
}
