<?php

namespace App\Services;

use App\Models\Manufacter;

class ManufacterService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Manufacter::class);
    }
}
