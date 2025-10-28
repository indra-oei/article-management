<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS | {{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid grid-cols-[240px_1fr] gap-3 bg-indigo-50 min-h-screen p-3">
    <div class=" bg-white rounded-xl px-4 py-4 shadow">
        <div class="flex justify-center h-[40px] mb-8">
            <img src="{{ asset('/images/LOGO_CODEBYIO.png') }}" class="h-full" alt="Website Logo">
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
    <main class="">
        {{ $slot }}
    </main>
    {{-- <footer>footer</footer> --}}
</body>
</html>