<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'order_date','status'];

    //Định nghĩa nhiều 1 của order với customer
    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    //Định nghĩa 1 nhiều của order với orderdetail
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    //Định nghĩa mối quan hệ nhiều nhiều của order với product
    public function products(){
        return $this->belongsToMany(Product::class, 'order_details')
                    ->withPivot('quantity') // Thêm cột bổ sung từ bảng pivot nếu cần
                    ->withTimestamps(); // Lưu thời gian tạo và cập nhật

    }    
}
