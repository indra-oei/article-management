<form wire:submit.prevent='submit' x-on:submit="$dispatch('show-loading')">
    <div class="mb-6">
        <label class="text-gray-600 text-sm font-medium">Username</label>
        <x-shared.input type="text" wire:model.defer='username' placeholder="Enter username" />
    </div>
    <div class="flex justify-end">
        <x-shared.button type="submit" variant="primary">Create</x-shared.button>
    </div>
</form>