<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{
    public function findAll(): Admin
    {
        return Admin::findAll();
    }

    public function create(array $data): Admin
    {
        return Admin::create($data);
    }
}
