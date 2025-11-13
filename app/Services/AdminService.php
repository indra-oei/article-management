<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\AdminRepository;

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

    public function create(array $data): Admin
    {
        return $this->admins->create($data);
    }
}
