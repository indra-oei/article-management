<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Collection;

class AdminRepository
{
    public function findAll(): Collection
    {
        return Admin::orderBy('username', 'asc')->get();
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

    public function changePassword(int $id, string $newPassword): Admin
    {
        $admin = Admin::findOrFail($id);
        $admin->update(['password' => $newPassword]);

        return $admin;
    }

    public function delete(int $id): bool
    {
        $admin = Admin::findOrFail($id);
        return $admin->delete();
    }
}
