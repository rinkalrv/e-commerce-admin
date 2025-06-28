<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => User::factory(),
            'total_amount' => $this->faker->randomFloat(2, 200, 20000),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid', 'refunded']),
            'shipping_address' => $this->faker->address,
            'billing_address' => $this->faker->address,
            'customer_note' => $this->faker->optional()->sentence,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}