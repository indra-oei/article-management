<?php

namespace App\Livewire\Admin\User;

use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserForm extends Component
{
    public ?array $user = null;
    public $username;

    protected $listeners = [
        'edit-user' => 'setUser',
        'close-modal' => 'clearForm'
    ];

    protected function rules(): array
    {
        return [
            'username' => [
                'required',
                'string',
                Rule::unique('admins', 'username')->ignore($this->user['id'] ?? null)
            ]
        ];
    }

    public function setUser(array $user)
    {
        $this->user = $user;

        $this->fill([
            'username' => $user['username'] ?? null
        ]);
    }

    public function clearForm()
    {
        $this->reset();
    }

    public function submit(AdminService $adminService)
    {
        $this->validate($this->rules());
        
        $payload = [
            'username' => $this->username
        ];

        if ($this->user) {
            $adminService->update($this->user['id'], $payload);

            $this->dispatch('toast', [
                'message' => 'User updated',
                'type' => 'success'
            ]);
        } else {
            $payload['password'] = Hash::make('admin123');
            $adminService->create($payload);

            $this->dispatch('toast', [
                'message' => 'User created',
                'type' => 'success'
            ]);
        }

        $this->dispatch('hide-loading');
        $this->dispatch('close-modal');
        $this->dispatch('refresh-table')->to('admin.user.user-table');
    }

    public function render()
    {
        return view('livewire.admin.user.user-form');
    }
}
