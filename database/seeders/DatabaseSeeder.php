<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MunicipalidadesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(TipoinpustSeeder::class);
        $this->call(TipoRespuestaSeeder::class);
        $this->call(EtapaproductoSeeder::class);
        $this->call(ConvocatoriaSeeder::class);
        $this->call(FormularioSeeder::class);
        $this->call(FormularioOptionSeeder::class);

        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
