<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurarse de que el rol 'administrador' existe
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);

        // Crear los administradores con sus datos
        $admins = [
            [
                'name' => 'Diego Cisternas',
                'email' => 'diego.cisternas2@virginiogomez.cl',
                'password' => bcrypt('password123'), // Cambia a una contraseña segura
            ],
            [
                'name' => 'Matias Alveal',
                'email' => 'matias.alveal@virginiogomez.cl',
                'password' => bcrypt('password123'), // Cambia a una contraseña segura
            ],
            [
                'name' => 'Camilo Maricic',
                'email' => 'camilo.maricic@virginiogomez.cl',
                'password' => bcrypt('password123'), // Cambia a una contraseña segura
            ],
        ];

        foreach ($admins as $adminData) {
            // Crear usuario si no existe
            $admin = User::firstOrCreate(
                ['email' => $adminData['email']],
                ['name' => $adminData['name'], 'password' => $adminData['password']]
            );

            // Asignar el rol 'administrador' al usuario
            if (!$admin->hasRole($adminRole->name)) {
                $admin->assignRole($adminRole);
            }
        }

        $this->command->info('Administradores creados y rol de administrador asignado correctamente.');
    }
}
