<?php

namespace App\Services;

use App\Models\Material;

class MaterialService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Material::class);
    }
}
