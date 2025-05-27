<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'colour',
        'category',
        'image_url',
    ];

    protected $casts = [
        'description' => 'array',
        'colour' => 'array',
        'image_url' => 'array',
    ];
}