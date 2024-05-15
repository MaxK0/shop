<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'status_id');
    }
}
