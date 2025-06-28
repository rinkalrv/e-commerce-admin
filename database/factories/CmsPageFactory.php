<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CmsPageFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->unique()->sentence(3);
        
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'meta_title' => $this->faker->optional()->sentence,
            'meta_description' => $this->faker->optional()->paragraph,
            'is_active' => true,
        ];
    }
}