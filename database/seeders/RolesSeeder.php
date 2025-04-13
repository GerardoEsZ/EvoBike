<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'cliente']);
        Role::create(['name' => 'empleado_produccion']);
        Role::create(['name' => 'empleado_reparacion']);
    }
}
