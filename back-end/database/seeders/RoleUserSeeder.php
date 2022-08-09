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
            'specialite' => 1,
            'sous_specialite' => 1
        ]);
        
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 4,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 1
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 5,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 1
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 6,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 2
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 7,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 2
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 8,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 2
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 9,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 2
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 10,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 2
           
        ]);
    
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 11,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 3
           
        ]);
       
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 12,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 3
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 13,
            'status' => 0,
            'specialite' => 1,
            'sous_specialite' => 3
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 14,
            'status' => 0,
            'specialite' => 2,
            'sous_specialite' => 4
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 15,
            'status' => 0,
            'specialite' => 2,
            'sous_specialite' => 4
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 16,
            'status' => 0,
            'specialite' => 2,
            'sous_specialite' => 4
           
        ]);

        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 17,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 5
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 18,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 5
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 19,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 5
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 20,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 5
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 21,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 6
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 22,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 6
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 2,
            'user_id' => 23,
            'status' => 0,
            'specialite' => 3,
            'sous_specialite' => 6
           
        ]);
        
        \App\Models\RoleUser::create([
            'role_id' => 3,
            'user_id' => 24,
            'status' => 1,
           
           
        ]);
        \App\Models\RoleUser::create([
            'role_id' => 3,
            'user_id' => 25,
            'status' => 1,
           
           
        ]);       
    }
}
