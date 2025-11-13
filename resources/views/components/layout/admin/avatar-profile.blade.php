<div x-data="{ open: false }" x-cloak class="relative" @mouseenter="open = true" @mouseleave="open = false">
    <div class="cursor-pointer">
        <img src="{{ asset('/images/avatar.jpg') }}" class="w-[45px] h-[45px] rounded-xl" alt="avatar">
    </div>
    <div
        x-show="open"
        x-transition
        class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg z-50"
    >
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
    </div>
</div>