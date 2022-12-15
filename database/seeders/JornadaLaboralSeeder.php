<?php

namespace Database\Seeders;

use App\Models\JornadaLaboral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JornadaLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JornadaLaboral::create(['jornada_laboral' => 'Completa (31 horas semanales o más)']);
        JornadaLaboral::create(['jornada_laboral' => 'Parcial (hasta 30 horas semanales)']);        
    }
}
