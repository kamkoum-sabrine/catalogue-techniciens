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
        SousSpecialite::factory(5)->create();
    }
}
