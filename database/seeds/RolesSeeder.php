<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            'name'  => 'Administrador Webmaster',
            'slug'  => 'administrador_webmaster',
        ]);

        App\Role::create([
            'name'  => 'Usuario Editor',
            'slug'  => 'usuario_editor',
        ]);
    }
}
