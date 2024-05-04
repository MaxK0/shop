<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status_id',
        'total_price',
        'phone', 'comment',
        'address_to', 'address_from_id'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'status_id' => 'integer',
        'total_price' => 'integer',
        'address_from_id' => 'integer'
    ];

    
}
