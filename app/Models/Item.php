<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'order_id',
        'food_id',
        'amount',
        'total',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
