<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminService
{
    protected AdminRepository $admins;

    /**
     * Create a new class instance.
     */
    public function __construct(AdminRepository $admins)
    {
        $this->admins = $admins;
    }

    public function findAll(): Collection
    {
        return $this->admins->findAll();
    }

    public function create(array $data): Admin
    {
        return $this->admins->create($data);
    }

    public function update(int $id, array $data): Admin
    {
        return $this->admins->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->admins->delete($id);
    }
}
