<?php

namespace App\Services;

use App\Models\User\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function all(): Collection
    {
        return Role::all();
    }

    public function allWIthPaginate(?int $perPage): LengthAwarePaginator
    {
        return Role::query()->paginate($perPage ?? 10);
    }

    public function create(array $data): Role
    {
        return Role::query()->create($data);
    }

    public function update(Role $role, array $data): bool
    {
        return $role->update($data);
    }

    public function delete(Role $role): ?bool
    {
        return $role->delete();
    }
}
