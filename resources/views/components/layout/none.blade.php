{{-- 

Why does this layout exist?
This layout exists to provide a blank layout option for Livewire components.
Since Livewire components have their default layout set in the configuration file,
we need a layout that does not interfere with the layouts used by Blade views. 

--}}

{{ $slot }}