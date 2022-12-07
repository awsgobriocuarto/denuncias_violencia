<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Gobierno Abierto',
            'email' => 'awsgobriocuarto@gmail.com',
            'password' => bcrypt('vH082Fg0AtS9'),
            'role_id' => 1
        ]);
        
        App\User::create([
            'name' => 'Usuario Editor Pruebas',
            'email' => 'copydot@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => 2,
        ]);
    }
}
