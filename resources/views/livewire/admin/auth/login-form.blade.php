<form wire:submit.prevent='login' class="bg-white w-full h-full md:w-[800px] md:h-[400px] grid items-center justify-center grid-cols-1 md:grid-cols-2 gap-1 md:gap-6 p-6 rounded">
    <img src="{{ asset('images/Auth.jpg') }}" alt="Auth">
    <div>
        <div class="mb-6">
            <h1 class="text-2xl text-gray-700 font-bold mb-2">Welcome Back to AMS</h1>
            <p class="text-gray-500 text-sm">Sign in to manage your articles, track progress, and publish content seamlessly.</p>
        </div>
        @error('username')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div class="mb-4">
            <x-shared.input type="text" wire:model.defer='username' icon="user" placeholder="Enter your username" />
        </div>
        <div class="mb-4">
            <x-shared.input type="password" wire:model.defer='password' icon="lock" placeholder="Enter your password" />
        </div>
        <x-shared.button type="submit" variant="primary" class="w-full">Login</x-shared.button>
    </div>
</form>