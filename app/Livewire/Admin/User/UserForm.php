<?php

namespace App\Livewire\Admin\User;

use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserForm extends Component
{
    public $adminId = null;
    public $username;
    public $email;

    protected $listeners = ['editUser'];

    protected function rules(): array
    {
        return [
            'username' => 'required|string|unique:admins,username,' . $this->adminId
        ];
    }

    public function editUser(array $user)
    {
        $this->adminId = $user['id'];
        $this->username = $user['username'];
        $this->email = $user['email'];

        $this->dispatch('open-user-modal');
    }

    public function submit(AdminService $adminService)
    {
        $this->validate($this->rules());
        
        $payload = [
            'username' => $this->username
        ];

        if ($this->adminId) {
            $adminService->update($this->adminId, $payload);

            $this->dispatch('toast', [
                'message' => 'User updated successfully!',
                'type' => 'success'
            ]);
        } else {
            $payload['password'] = Hash::make('admin123');
            $adminService->create($payload);

            $this->dispatch('toast', [
                'message' => 'User created successfully!',
                'type' => 'success'
            ]);
        }

        $this->reset();

        $this->dispatch('close-user-modal');
    }

    public function render()
    {
        return view('livewire.admin.user.user-form');
    }
}
