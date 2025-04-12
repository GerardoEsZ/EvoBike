<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Crear el rol de administrador si no existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Verificar si ya existe un usuario con ese correo
        $admin = User::firstOrCreate(
            ['email' => 'admin@evobike.com'],
            [
                'name' => 'Administrador Principal',
                'password' => Hash::make('admin123')
            ]
        );

        // Asignar el rol si no lo tiene aún
        if (!$admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }
    }
}
