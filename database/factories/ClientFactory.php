<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cod' => $this->faker->randomNumber(2),
            'city_id' => $this->faker->randomElement(['1', '2', '3']),
            'created_at' => now(),
        ];
    }
}
