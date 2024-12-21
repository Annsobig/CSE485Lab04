<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = ['name', 'birthday', 'address', 'phone'];

    //Dịnh nghĩa mối quan hệ của Reader với Borrow
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
