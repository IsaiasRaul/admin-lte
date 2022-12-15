<?php

namespace Database\Seeders;

use App\Models\CalidadContractual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalidadContractualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalidadContractual::create(['calidad_contractual' => 'Planta']);
        CalidadContractual::create(['calidad_contractual' => 'Contrata']);
        CalidadContractual::create(['calidad_contractual' => 'Código del Trabajo']);
    }
}
