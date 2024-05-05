<?php

namespace App\Models\Order;

use App\Models\Address;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function addressFrom(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_from_id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }
}
