<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'prestataire',
        ]);
        Role::create([
            'name' => 'client',
        ]);
        Role::create([
            'name' => 'visiteur',
        ]);
       
    }
}
