<?php

namespace App\Services;

use App\Models\User\Role;

class RoleService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Role::class);
    }
}
