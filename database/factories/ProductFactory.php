<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence();

        return [
            'name' => $name,
            'description' => $this->faker->sentences(rand(2, 5), true),
            'image' => $this->faker->imageUrl(),
            // 'slug' => Str::slug($name),
            'price' => rand(500, 10000),
            'active' => $this->faker->boolean(80)
        ];
    }
}
