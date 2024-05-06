<?php

namespace App\Services;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function getAllWithPaginate(?int $offset): LengthAwarePaginator
    {
        return User::query()->paginate($offset ?? 10);
    }

    public function create(array $data): User
    {
        return User::query()->create($data);
    }

    public function update(User $user, array $data): int
    {
        return $user::query()->update($data);
    }

    public function delete(User $user): mixed
    {
        return $user::query()->delete();
    }
}
