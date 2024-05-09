<?php

namespace App\Services;

use App\Models\User\User;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(User::class);
    }
}
