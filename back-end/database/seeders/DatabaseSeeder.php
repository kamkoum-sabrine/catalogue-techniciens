<?php

namespace Database\Seeders;

use App\Models\SousSpecialite;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SpecialiteSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(2)->create();
        $this->call(RoleSeeder::class);
        $this->call(SpecialiteSeeder::class);
        $this->call(SousSpecialiteSeeder::class);
         
        
    }
}
