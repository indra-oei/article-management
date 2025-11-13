<?php

namespace App\Livewire\Admin\User;

use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserForm extends Component
{
    public $username;
    public $email;

    protected $rules = [
        'username' => 'required|string|unique:admins,username'
    ];

    public function submit(AdminService $adminService)
    {
        $this->validate();

        $adminService->create([
            'username' => $this->username,
            'password' => Hash::make('admin123')
        ]);

        $this->reset();

        $this->dispatch('close-user-modal');

        $this->dispatch('toast', [
            'message' => 'User created successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.user.user-form');
    }
}
