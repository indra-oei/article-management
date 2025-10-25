<form wire:submit.prevent='login' class="bg-white md:shadow-xl flex flex-col border border-gray-200 justify-center w-full h-full md:w-[400px] md:h-[400px] p-6 rounded-md">
    <div class="mb-6">
        <h1 class="text-2xl text-gray-700 font-bold mb-2">Welcome Back to AMS</h1>
        <p class="text-gray-500 text-sm">Sign in to manage your articles, track progress, and publish content seamlessly.</p>
    </div>
    <div class="mb-4">
        <x-shared.input type="text" wire:model.defer='username' icon="user" placeholder="Enter your username" />
    </div>
    <div class="mb-4">
        <x-shared.input type="password" wire:model.defer='password' icon="lock" placeholder="Enter your password" />
    </div>
    <x-shared.button type="submit" variant="primary" class="w-full">Login</x-shared.button>
</form>