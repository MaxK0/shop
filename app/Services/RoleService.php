<?php

namespace App\Services;

use App\Models\User\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function all(): Collection
    {
        return Role::all();
    }
}
