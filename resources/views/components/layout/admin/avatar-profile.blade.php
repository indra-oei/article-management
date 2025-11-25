<div x-data="{ open: false }" x-cloak class="relative" @mouseenter="open = true" @mouseleave="open = false">
    <div class="cursor-pointer">
        <img src="{{ asset('/images/avatar.jpg') }}" class="w-[45px] h-[45px] rounded-xl" alt="avatar">
    </div>
    <div
        x-show="open"
        x-transition
        class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg z-50"
    >
        <div class="flex flex-col leading-4.5 px-4 py-2 border-b-2 border-b-indigo-100">
            <p class="text-gray-600 font-medium">{{ $user->username }}</p>
            <small class="text-2xs text-gray-400">Admin/Author</small>
        </div>
        <a href="/admin/change-password" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Change Password</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left cursor-pointer px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Log Out</button>
        </form>
    </div>
</div>