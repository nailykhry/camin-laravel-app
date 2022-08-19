<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ukuran>
 */
class UkuranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sepatu_id' =>  $this->faker->numberBetween(1, 20),
            'u_ukuran' => $this->faker->numberBetween(30, 50),
            'u_deksripsi' => Str::random(10),
            'u_stock' => $this->faker->numberBetween(1, 20),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
