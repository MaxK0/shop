<?php

namespace App\Services;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function allWithRolePaginate(?int $perPage): LengthAwarePaginator
    {
        return User::query()->with('role')->paginate($perPage ?? 25);
    }
}
