<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
       'id',
       'name',
       'price',
       'is_selling',
       'is_hot',
       'image',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
