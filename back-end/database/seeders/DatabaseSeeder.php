<?php

namespace Database\Seeders;

use App\Models\SousSpecialite;
use Illuminate\Database\Seeder;
use Database\Seeders\RateSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoleUserSeeder;
use Database\Seeders\RendezVousSeeder;
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
         $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SpecialiteSeeder::class);
        $this->call(SousSpecialiteSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(RendezVousSeeder::class);
    }
}
