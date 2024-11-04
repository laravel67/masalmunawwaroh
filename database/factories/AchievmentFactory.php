<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievment>
 */
class AchievmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'tingkat' => $this->faker->randomElement(['Internasional', 'Nasional', 'Provinsi', 'Kabupaten', 'Kecamatan', 'Desa', 'Sekolah']),
            'category' => $this->faker->randomElement(['akademik', 'nonakademik', 'siswa']),
            'body' => $this->faker->paragraph,
            'image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
