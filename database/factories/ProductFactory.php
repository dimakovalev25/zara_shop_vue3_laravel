<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            "title" => fake()->text(),
            "description" => fake()->realText(500),
            'image' => fake()->imageUrl(),
            "price" => fake()->randomFloat(2,2,5),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
            'category_id' => 1,

        ];
    }
}
