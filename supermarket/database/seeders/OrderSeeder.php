<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'customer_id' => 1,
                'order_date' => Carbon::now()->subDays(10), // 10 ngày trước
                'status' => 0,
            ],
            [
                'customer_id' => 2,
                'order_date' => Carbon::now()->subDays(5), // 5 ngày trước
                'status' => 1,
            ],
            [
                'customer_id' => 3,
                'order_date' => Carbon::now(), // Ngày hôm nay
                'status' => 3,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
