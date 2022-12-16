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
            'name'  => 'Webmaster',
            'slug'  => 'webmaster',
        ]);

        App\Role::create([
            'name'  => 'Administrador',
            'slug'  => 'administrador',
        ]);

        App\Role::create([
            'name'  => 'Usuario receptor',
            'slug'  => 'usuario_receptor',
        ]);
    }
}
