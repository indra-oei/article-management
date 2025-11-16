<form wire:submit.prevent='submit' x-on:submit="$dispatch('show-loading')">
    <div class="mb-6">
        <label class="block text-gray-600 text-sm font-medium mb-1">Category Name</label>
        <x-shared.input type="text" wire:model.defer='name' placeholder="Enter category name" />
    </div>
    <div class="flex justify-end">
        <x-shared.button type="submit" variant="primary">Create</x-shared.button>
    </div>
</form>