<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->unique()->word;
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
            'is_active' => true,
        ];
    }
}