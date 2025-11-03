<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS | {{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="grid grid-cols-[240px_1fr] bg-indigo-50 min-h-screen">
    <div class="flex flex-col bg-white rounded-xl px-4 py-4 ml-3 mt-3 mb-3 gap-8 shadow">
        <div class="flex gap-2">
            <img src="{{ asset('/images/LOGO_CODEBYIO.png') }}" class="h-[35px]" alt="Website Logo">
            <div class="flex flex-col">
                <p class="text-xl font-black text-gray-600">AMS</p>
                <small class="text-gray-400 text-xs block">Article Management System</small>
            </div>
        </div>
        <nav>
            <ul>
                <li>
                    <x-layout.admin.nav-link href="/admin/dashboard" icon="home" :isOpen="request()->routeIs('admin.dashboard')">Dashboard</x-layout.admin.nav-link>
                </li>
                <li>
                    <x-layout.admin.nav-link href="/admin/users" icon="user-group" :isOpen="request()->routeIs('admin.users', 'admin.users.*')">Users</x-layout.admin.nav-link>
                </li>
                <li>
                    <x-layout.admin.nav-link href="/admin/category" icon="setting" :isOpen="request()->routeIs('admin.category')">Category</x-layout.admin.nav-link>
                </li>
                <li>
                    <x-layout.admin.nav-link href="/admin/articles" icon="book-open" :isOpen="request()->routeIs('admin.articles')">Article</x-layout.admin.nav-link>
                </li>
            </ul>
        </nav>
    </div>
    <div class="flex flex-col">
        <header class="flex justify-between pl-3 pt-3 pr-3">
            @isset($pageTitle)
                {{ $pageTitle }}
            @endisset

            <x-layout.admin.avatar-profile />
        </header>
        <main class="flex-1 overflow-y-auto p-3">
            {{ $slot }}
        </main>
    </div>
    {{-- <footer>footer</footer> --}}
    @livewireScripts
</body>
</html>