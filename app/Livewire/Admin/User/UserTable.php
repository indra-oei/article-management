<?php

namespace App\Livewire\Admin\User;

use App\Services\AdminService;
use Livewire\Component;

class UserTable extends Component
{
    protected AdminService $adminService;
    protected $listeners = [
        'refresh-table' => '$refresh'
    ];

    public function boot(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function getUsersProperty(): array
    {
        return $this->adminService->findAll()->toArray();
    }

    public function deleteUser(int $id): void
    {
        $this->adminService->delete($id);
        $this->dispatch('$refresh');
        $this->dispatch('toast', [
            'message' => 'User deleted',
            'type' => 'error'
        ]);
    }
    
    public function render()
    {   
        return view('livewire.admin.user.user-table', [
            'headers' => [
                'username' => 'Username'
            ],
            'rows' => $this->users
        ]);
    }
}
