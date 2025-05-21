<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'order_cost',
        'order_status',
        'user_id',
        'user_phone',
        'user_city',
        'user_address',
        'order_date'
    ];
}
