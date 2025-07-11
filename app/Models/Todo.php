<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'detail',
        'author',
        'date',
        'status',
    ];
    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at'
    ];

    // You can add additional methods or relationships here if needed
}
