<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ekskul>
 */
class EkskulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => Str::slug($this->faker->name),
            'category' => $this->faker->randomElement(['fisik', 'nonfisik']),
            'image' => 'default.jpg', // Placeholder image, replace with actual file path if needed
            'body' => implode("\n\n", $this->faker->paragraphs(10)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
