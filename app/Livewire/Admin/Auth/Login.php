<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public function render()
    {
        /** @var \Livewire\Views\View $view */
        $view = view('livewire.admin.auth.login');

        return $view->layout('components.layout.admin.auth-layout');
    }
}
