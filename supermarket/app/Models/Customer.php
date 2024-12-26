<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email'];

    //Định nghĩa mối quan hệ 1 nhiều của khách háng với order
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
