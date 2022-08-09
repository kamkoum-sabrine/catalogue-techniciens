<?php

namespace Database\Seeders;

use App\Models\Specialite;
use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specialite::factory(5)->create();
        \App\Models\Specialite::create([
            'name' => "Maintenance et réparation",
        ]);
        \App\Models\Specialite::create([
            'name' => "Chauffeur",
        ]);
        \App\Models\Specialite::create([
            'name' => "Santé",
        ]);

    }
}
