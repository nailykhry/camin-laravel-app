<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sepatu>
 */
class SepatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            's_foto' => $this->faker->imageUrl(640, 480, 'shoe', true),
            's_nama' => Str::random(10),
            's_kategori' => Str::random(10),
            's_deskripsi' => Str::random(100),
            's_hargabeli' => $this->faker->numerify('####0000'),
            's_hargajual' => $this->faker->numerify('#####0000'),
            's_bahan' => Str::random(10),
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
