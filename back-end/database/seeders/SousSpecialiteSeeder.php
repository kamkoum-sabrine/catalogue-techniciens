<?php

namespace Database\Seeders;

use App\Models\SousSpecialite;
use Illuminate\Database\Seeder;

class SousSpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SousSpecialite::factory(5)->create();
        \App\Models\SousSpecialite::create([
            'name' => "Plomberie",
            'specialite_id' => "1"
        ]);
        \App\Models\SousSpecialite::create([
            'name' => "Electricité",
            'specialite_id' => "1"
        ]);
        \App\Models\SousSpecialite::create([
            'name' => "Aluminium",
            'specialite_id' => "1"
        ]);
        \App\Models\SousSpecialite::create([
            'name' => "Taxi",
            'specialite_id' => "2"
        ]);
        \App\Models\SousSpecialite::create([
            'name' => "Infrirmerie",
            'specialite_id' => "3"
        ]);
        \App\Models\SousSpecialite::create([
            'name' => "Docteur généraliste",
            'specialite_id' => "3"
        ]);
    }
}
