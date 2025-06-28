<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph,
            'image_path' => 'banners/' . $this->faker->image('public/storage/banners', 1920, 1080, null, false),
            'is_active' => $this->faker->boolean(80),
            'position' => $this->faker->numberBetween(1, 10),
            'url' => $this->faker->optional()->url,
        ];
    }
}