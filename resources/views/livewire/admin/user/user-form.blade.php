<form wire:submit.prevent='submit'>
    <div class="mb-6">
        <label class="text-gray-600 text-sm font-medium">Username</label>
        <x-shared.input type="text" wire:model.defer='username' placeholder="Enter username" />
    </div>
    <div class="text-right">
        <x-shared.button type="submit" variant="primary">Create</x-shared.button>
    </div>

    <x-ui.loading-overlay />
</form>