<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách order_id và product_id từ bảng orders và products
        $orderIds = Order::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        // Kiểm tra nếu mảng rỗng
        if (empty($orderIds) || empty($productIds)) {
            $this->command->error('Bảng orders hoặc products không có dữ liệu!');
            return;
        }

        // Danh sách dữ liệu mẫu
        $order_details = [
            [
                'order_id' => $orderIds[array_rand($orderIds)], // Chọn ngẫu nhiên một order_id
                'product_id' => $productIds[array_rand($productIds)], // Chọn ngẫu nhiên một product_id
                'quantity' => rand(1, 10), // Số lượng ngẫu nhiên từ 1 đến 10
            ],
            [
                'order_id' => $orderIds[array_rand($orderIds)],
                'product_id' => $productIds[array_rand($productIds)],
                'quantity' => rand(1, 10),
            ],
            [
                'order_id' => $orderIds[array_rand($orderIds)],
                'product_id' => $productIds[array_rand($productIds)],
                'quantity' => rand(1, 10),
            ],
        ];

        // Lưu vào cơ sở dữ liệu
        foreach ($order_details as $detail) {
            OrderDetail::create($detail);
        }
    }
}
