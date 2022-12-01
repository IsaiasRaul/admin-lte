<?php

namespace Database\Seeders;

use App\Models\TipoInputs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoinpustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoInputs::create(['tipo_inputs' => 'Text']);
        TipoInputs::create(['tipo_inputs' => 'TextArea']);
        TipoInputs::create(['tipo_inputs' => 'Select']);
        TipoInputs::create(['tipo_inputs' => 'RadioButtton']);
        TipoInputs::create(['tipo_inputs' => 'Checkbox']);
        TipoInputs::create(['tipo_inputs' => 'file']);
        TipoInputs::create(['tipo_inputs' => 'email']);
        TipoInputs::create(['tipo_inputs' => 'Multiselect']);
        TipoInputs::create(['tipo_inputs' => 'RUN']);
        TipoInputs::create(['tipo_inputs' => 'Numerico']);
    }
}
