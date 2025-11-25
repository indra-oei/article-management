<?php

namespace App\View\Components\Layout\Admin;

use App\Models\Admin;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AvatarProfile extends Component
{
    public ?Admin $user = null;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->user = Auth::guard('admin')->user();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.admin.avatar-profile');
    }
}
