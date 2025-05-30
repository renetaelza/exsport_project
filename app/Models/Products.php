<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $casts = [
        'colour' => 'array',
    ];

    protected $casts2 = [
        'description' => 'array',
    ];
}
