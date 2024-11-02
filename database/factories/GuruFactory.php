<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => Str::slug($this->faker->unique()->name), // Slug unik untuk setiap nama
            'pendidikan' => $this->faker->randomElement(['S1', 'S2', 'S3', 'D3', 'D4']),
            'mulai_mengajar' => $this->faker->date(),
            'guru_mapel' => $this->faker->optional()->word,
            'jabatan' => $this->faker->optional()->jobTitle,
            'biografi' => $this->faker->optional()->paragraph,
            'image' => null,
        ];
    }
}
