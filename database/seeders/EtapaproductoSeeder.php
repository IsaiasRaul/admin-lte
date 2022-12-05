<?php

namespace Database\Seeders;

use App\Models\Etapaproductos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtapaproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etapaproductos::create(['title' => 'Selección Preferente', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Contratación De Personas Con Discapacidad', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Detalle De Las Personas Con Discapacidad', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Difusión Informa Previo', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Término y Envío De Formulario', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
    }
}
