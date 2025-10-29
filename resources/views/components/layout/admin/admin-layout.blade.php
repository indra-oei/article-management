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
<body class="grid grid-cols-[240px_1fr] gap-3 bg-indigo-50 min-h-screen p-3">
    <div class="flex flex-col bg-white rounded-xl px-4 py-4 gap-8 shadow">
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
                    <x-layout.admin.nav-link icon="home" :isOpen="request()->routeIs('admin.dashboard')">Dashboard</x-layout.admin.nav-link>
                </li>
                <li>
                    <x-layout.admin.nav-link icon="user-group" :isOpen="request()->routeIs('admin.user.*')">Users</x-layout.admin.nav-link>
                </li>
                <li>
                    <x-layout.admin.nav-link icon="setting" :isOpen="request()->routeIs('admin.category.*')">Category</x-layout.admin.nav-link>
                </li>
                <li>
                    <x-layout.admin.nav-link icon="book-open" :isOpen="request()->routeIs('admin.article.*')">Article</x-layout.admin.nav-link>
                </li>
            </ul>
        </nav>
    </div>
    <div class="flex flex-col gap-3">
        <header class="flex justify-between">
            @isset($pageTitle)
                {{ $pageTitle }}
            @endisset

            <x-layout.admin.avatar-profile />
        </header>
        <main class="flex-1 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
    {{-- <footer>footer</footer> --}}
    @livewireScripts
</body>
</html>