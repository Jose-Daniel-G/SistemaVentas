<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {

        $description = $this->faker->unique()->word(20);

        return [
            'description' => $description,
        ];
    }
}
