<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RoleUser::create([
            'role_id' => 1,
            'user_id' => 1,
            'status' => 1
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 2,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 1
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 3,
            'status' => 0,
            'specialite' => 2
        ]);
        
    }
}
