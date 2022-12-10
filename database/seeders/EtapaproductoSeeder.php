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
        Etapaproductos::create(['title' => 'Identificación Del Informante', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Selección Preferente', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>2, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Medidas de Accesibilidad En Procesos de Selección', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>3, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Mantención Y Contratación De Personas Con Discapacidad', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>4, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Difusión Informes Período Anterior Reportado', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>5, 'activo'=>1]);
        Etapaproductos::create(['title' => 'Término Y Envío De Formulario', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>6, 'activo'=>1]);
    }
}
