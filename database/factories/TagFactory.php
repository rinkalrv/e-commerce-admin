<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->unique()->word;
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}