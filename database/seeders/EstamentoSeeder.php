<?php

namespace Database\Seeders;

use App\Models\Estamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estamento::create(['estamento' => 'Directivo']);
        Estamento::create(['estamento' => 'Profesional']);
        Estamento::create(['estamento' => 'Administrativo']);
        Estamento::create(['estamento' => 'Técnico o Auxiliar']);
    }
}
