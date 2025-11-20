<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-indigo-100">
    <main class="w-screen h-screen flex items-center justify-center">
        {{ $slot }}
    </main>
    <x-ui.toast-bar />
    @livewireScripts
</body>
</html>