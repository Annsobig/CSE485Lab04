<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dữ liệu mẫu cho bảng Customers
        $customers = [
            ['name' => 'Le Ngan Ha', 'address' => 'Long Bien - Ha Noi', 'phone' => '123456789', 'email' => 'nganhane@gmail.com'],
            ['name' => 'Le Thu Ngan', 'address' => 'Hoang Mai - Ha Noi', 'phone' => '237632737', 'email' => 'thungan@gmail.com'],
            ['name' => 'Nguyen Duy Xuan', 'address' => 'Dong Da - Ha Noi', 'phone' => '374826483', 'email' => 'duyxuan@gmail.com'],
            ['name' => 'Trinh Phuong Linh', 'address' => 'Hoan Kiem - Ha Noi', 'phone' => '375939579', 'email' => 'phuonglinh@gmail.com'],
            ['name' => 'Ngo Duy Manh', 'address' => 'Cau Giay - Ha Noi', 'phone' => '947268464', 'email' => 'duymanh@gmail.com'],

        ];

        // Insert dữ liệu vào bảng
        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
