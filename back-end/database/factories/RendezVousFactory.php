<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RendezVousFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => User::get('id')->random(),
            'prestataire_id' => User::get('id')->random(),
            "date_rdv" => $this->faker->datetime(),
            "status" => 0

        ];
    }
}
