<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'date',
        'title',
        'content',
        'is_major',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
