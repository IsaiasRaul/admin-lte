<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Municipalidad']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.registrar'])->assignRole($role1);

        Permission::create(['name' => 'profile.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'profile.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'form'])->syncRoles([$role2]);
        Permission::create(['name' => 'form.respuesta'])->syncRoles([$role2]);


        
    }
}
