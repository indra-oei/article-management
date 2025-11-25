<?php

namespace App\Livewire\Admin\ChangePassword;

use App\Services\AdminService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordForm extends Component
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    protected function rules(): array
    {
        return [
            'oldPassword' => ['required', 'current_password:admin'],
            'newPassword' => [
                'required',
                'string',
                'min:8',
                'different:oldPassword',
                'regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*#?&]).+$/'
            ],
            'confirmPassword' => ['required', 'same:newPassword']
        ];
    }

    protected function messages()
    {
        return [
            'newPassword.regex' => 'Password must contain at least one uppercase letter, one number, and one special character.'
        ];
    }

    public function update(AdminService $adminService)
    {
        try {
            $this->validate();

            $adminService->changePassword(Auth::guard('admin')->user()->id, Hash::make($this->newPassword));
            
            $this->reset();
            $this->dispatch('toast', [
                'message' => 'Password updated',
                'type' => 'success'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('toast', ['message' => 'Check your form', 'type' => 'error']);
            throw $e;
        } catch (\Throwable $th) {
            $this->dispatch('toast', ['message' => 'Something went wrong', 'type' => 'error']);
            throw $th;
            die();
        } finally {
            $this->dispatch('hide-loading');
        }
    }

    public function render()
    {
        return view('livewire.admin.change-password.change-password-form');
    }
}
