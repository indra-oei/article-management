<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        session()->flash('toast', [
            'message' => 'Logged Out. See you next time!',
            'type' => 'info',
        ]);

        return redirect()->route('admin.login');
    }
}
