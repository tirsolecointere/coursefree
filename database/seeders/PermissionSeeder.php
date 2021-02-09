<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        Permission::create([
            'name' => 'Ver dashboard',
        ]);

        // Cursos
        Permission::create([
            'name' => 'Crear cursos',
        ]);
        Permission::create([
            'name' => 'Ver cursos',
        ]);
        Permission::create([
            'name' => 'Editar cursos',
        ]);
        Permission::create([
            'name' => 'Eliminar cursos',
        ]);

        // Roles
        Permission::create([
            'name' => 'Crear roles',
        ]);
        Permission::create([
            'name' => 'Ver roles',
        ]);
        Permission::create([
            'name' => 'Editar roles',
        ]);
        Permission::create([
            'name' => 'Eliminar roles',
        ]);

        // Usuarios
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
        Permission::create([
            'name' => 'Ver usuarios',
        ]);

    }
}
