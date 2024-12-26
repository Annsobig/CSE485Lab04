<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Nuoc cam',
                'description' => 'Description for Nuoc cam',
                'price' => 100.00,
                'quantity' => 50,
            ],
            [
                'name' => 'Nuoc tao',
                'description' => 'Description for Nuoc tao',
                'price' => 200.00,
                'quantity' => 30,
            ],
            [
                'name' => 'Nuoc mia',
                'description' => 'Description for Nuoc mia',
                'price' => 150.00,
                'quantity' => 20,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
