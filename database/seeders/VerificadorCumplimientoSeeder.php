<?php

namespace Database\Seeders;

use App\Models\VerificadorCumplimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerificadorCumplimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VerificadorCumplimiento::create(['verificador_cumplimiento' => 'Certificación COMPIN']);
        VerificadorCumplimiento::create(['verificador_cumplimiento' => 'Registro Nacional de Discapacidad']);
        VerificadorCumplimiento::create(['verificador_cumplimiento' => 'Pensión de Invalidez']);
    }
}
