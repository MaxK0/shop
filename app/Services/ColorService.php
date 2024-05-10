<?php

namespace App\Services;

use App\Models\Color;

class ColorService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Color::class);
    }
}
