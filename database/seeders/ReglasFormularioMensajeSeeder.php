<?php

namespace Database\Seeders;

use App\Models\ReglasFormularioMensaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ReglasFormularioMensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReglasFormularioMensaje::create(['id_regla' => '1', 'configuracion_mensaje'=>'required','mensaje'=>'Campo Nombre no puede ser vacio']);
        ReglasFormularioMensaje::create(['id_regla' => '1', 'configuracion_mensaje'=>'max','mensaje'=>'Campo Nombre no puede exceder los 2000 caracteres']);
        ReglasFormularioMensaje::create(['id_regla' => '2', 'configuracion_mensaje'=>'required','mensaje'=>'El campo cargo no puede ser vacio']);
    }
}
