<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galeri>
 */
class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = $this->faker->randomElement(['foto', 'video']);
        return [
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'category' => $category,
            'link_video' => $category === 'video' ? 'https://youtu.be/ebt42Izlu84?si=5Ej5sdkZWoX8ngnN' : null,
            'images' => $category === 'foto' ? $this->faker->imageUrl(640, 480, 'gallery') : null,
            'body' => implode("\n\n", $this->faker->paragraphs(10)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
