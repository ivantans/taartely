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
    public function definition(): array
    {
        return [
            "name" => $this->faker->sentence(mt_rand(2, 6)),
            "category_id" => mt_rand(1, 3),
            "user_id" => 1,
            "slug" => $this->faker->slug(),
            "excerpt" => $this->faker->sentence(mt_rand(5, 20)),
            "description" => $this->faker->sentence(mt_rand(5, 20)),
            "photo" => "path",
            "price" => mt_rand(100000, 500000),
        ];
    }
}
