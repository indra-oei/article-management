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

    public function update(int $id, array $data): Admin
    {
        $admin = Admin::findOrFail($id);
        $admin->update($data);

        return $admin;
    }

    public function delete(int $id): bool
    {
        $admin = Admin::findOrFail($id);
        return $admin->delete();
    }
}
