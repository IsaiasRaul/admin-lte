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
        Etapaproductos::create(['title' => 'SELECCIÓN PREFERENTE', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'MANTENCIÓN Y CONTRATACIÓN DE PERSONAS CON DISCAPACIDAD', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'DETALLE DE LAS PERSONAS CON DISCAPACIDAD', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'DIFUSIÓN INFORME PREVIO', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
        Etapaproductos::create(['title' => 'TÉRMINO Y ENVÍO DE FORMULARIO', 'id_producto'=>1, 'icon_class'=>'fa fa users', 'orden'=>1, 'activo'=>1]);
    }
}
