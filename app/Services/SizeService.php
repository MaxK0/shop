<?php

namespace App\Services;

use App\Models\Size;

class SizeService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Size::class);
    }
}