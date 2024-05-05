<?php

namespace App\Models\Payment;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'order_id',
        'type_id', 'status_id', 'payment_system_id',
        'transaction_id'
    ];

    protected $casts = [
        'amount' => 'integer',
        'order_id' => 'integer',
        'type_id' => 'integer',
        'status_id' => 'integer',
        'payment_system_id' => 'integer'
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class, 'type_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class, 'status_id');
    }

    public function paymentSystem(): BelongsTo
    {
        return $this->belongsTo(PaymentSystem::class);
    }
}
