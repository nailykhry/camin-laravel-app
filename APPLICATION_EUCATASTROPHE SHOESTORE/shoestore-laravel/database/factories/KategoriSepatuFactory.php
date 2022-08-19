<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KategoriSepatuFactory extends Factory
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
            'kategori_id' =>  $this->faker->numberBetween(1, 4),
        ];
    }
}
