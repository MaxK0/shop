<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
