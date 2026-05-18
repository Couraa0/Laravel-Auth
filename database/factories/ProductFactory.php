<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 5),
            'image' => 'https://via.placeholder.com/640x480.png/0099ee? text=Produk',
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(10, 500) * 1000,
            'stock' => fake()->numberBetween(5, 100),
        ];
    }
}
