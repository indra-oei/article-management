<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::guard('admin')->attempt(['username' => $this->username, 'password' => $this->password])) {
            request()->session()->regenerate();

            session()->flash('toast', [
                'message' => 'Welcome back ' . Auth::guard('admin')->user()->username . '!',
                'type' => 'info',
            ]);
            return redirect()->intended(route('admin.dashboard'));
        }

        $this->dispatch('hide-loading');
        $this->dispatch('toast', [
            'message' => 'User not found or wrong credentials',
            'type' => 'error'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.auth.login-form');
    }
}
