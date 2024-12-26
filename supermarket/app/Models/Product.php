<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Định nghĩa mối quan hệ nhiều nhiều của product với orderdetail
    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details')
                    ->withPivot('quantity') // Thêm cột bổ sung từ bảng pivot nếu cần
                    ->withTimestamps(); // Lưu thời gian tạo và cập nhật

    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
