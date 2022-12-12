<?php

use Illuminate\Database\Seeder;

class PortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Portal::create([
            'name' => 'Portal 1',
            'slug' => 'portal_1',
        ]);

        App\Portal::create([
            'name' => 'Portal 2',
            'slug' => 'portal_2',
        ]);
        
    }
}
