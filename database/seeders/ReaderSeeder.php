<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reader;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dữ liệu mẫu cho bảng readers
        $readers = [
            ['name' => 'Nguyen Van A', 'birthday' => '1995-01-01', 'address' => 'Hanoi, Vietnam', 'phone' => '0123456789'],
            ['name' => 'Tran Thi B', 'birthday' => '1998-03-15', 'address' => 'Ho Chi Minh City, Vietnam', 'phone' => '0987654321'],
            ['name' => 'Pham Van C', 'birthday' => '2000-07-20', 'address' => 'Danang, Vietnam', 'phone' => '0912345678'],
            ['name' => 'Le Thi D', 'birthday' => '1997-12-10', 'address' => 'Can Tho, Vietnam', 'phone' => '0934567890'],
            ['name' => 'Hoang Van E', 'birthday' => '1999-05-25', 'address' => 'Hai Phong, Vietnam', 'phone' => '0945678901'],
        ];

        // Insert dữ liệu vào bảng
        foreach ($readers as $reader) {
            Reader::create($reader);
        }
    }
}
