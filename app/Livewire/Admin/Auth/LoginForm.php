<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
            session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        $this->addError('username', 'The provided credentials are incorrect.');
    }

    public function render()
    {
        return view('livewire.admin.auth.login-form');
    }
}
