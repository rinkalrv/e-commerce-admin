<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   public function run()
    {
        // Create admin and users
        $this->call(AdminUserSeeder::class);
        \App\Models\User::factory(10)->create();

        // Create categories and tags
        \App\Models\Category::factory(6)->create();
        \App\Models\Tag::factory(6)->create();

        // Create products and attach tags
        \App\Models\Product::factory(50)->create()->each(function ($product) {
            $product->tags()->attach(
                \App\Models\Tag::inRandomOrder()
                    ->limit(rand(1, 3))
                    ->pluck('id')
                    ->toArray()
            );
        });

        // Create orders with items
        \App\Models\Order::factory(30)->create()->each(function ($order) {
            \App\Models\OrderItem::factory(rand(1, 5))->create([
                'order_id' => $order->id,
            ]);
            
            // Recalculate total
            // $order->updateTotal();
        });

        // Create CMS content
        \App\Models\CmsPage::factory(4)->create();
        \App\Models\Banner::factory(5)->create();
    }
}
