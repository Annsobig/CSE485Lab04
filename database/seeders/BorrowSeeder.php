<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy reader_id và book_id từ bảng readers và books
        $readerIds = \App\Models\Reader::pluck('id')->toArray();
        $bookIds = \App\Models\Book::pluck('id')->toArray();

        // Đảm bảo có dữ liệu để tham chiếu
        if (empty($readerIds) || empty($bookIds)) {
            throw new \Exception('Không có dữ liệu trong bảng readers hoặc books.');
        }

        // Dữ liệu mẫu
        $borrows = [
            [
                'reader_id' => $readerIds[0],
                'book_id' => $bookIds[0],
                'borrow_date' => '2024-01-15',
                'return_date' => '2024-01-30',
                'status' => 1,
            ],
            [
                'reader_id' => $readerIds[1],
                'book_id' => $bookIds[1],
                'borrow_date' => '2024-02-10',
                'return_date' => '2024-02-25',
                'status' => 0,
            ],
        ];

        foreach ($borrows as $borrow) {
            Borrow::create($borrow);
        }
    }
}
