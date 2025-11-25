<form wire:submit.prevent='update' x-on:submit="$dispatch('show-loading')" class="bg-white rounded-xl p-4 shadow">
    <div class="flex items-center gap-2 mb-5">
        <label class="min-w-[150px] text-gray-600">Old Password</label>
        <x-shared.input type="password" wire:model.defer='oldPassword' class="flex-2" :error="$errors->first('oldPassword')" placeholder="Enter old password" />
    </div>
    <div class="flex items-center gap-2 mb-5">
        <label class="min-w-[150px] text-gray-600">New Password</label>
        <x-shared.input type="password" wire:model.defer='newPassword' class="flex-2" :error="$errors->first('newPassword')" placeholder="Enter new password" />
    </div>
    <div class="flex items-center gap-2 mb-7">
        <label class="min-w-[150px] text-gray-600">Confirm Password</label>
        <x-shared.input type="password" wire:model.defer='confirmPassword' class="flex-2" :error="$errors->first('confirmPassword')" placeholder="Enter confirm password" />
    </div>
    <div class="flex justify-end">
        <x-shared.button type="submit" size="large">Update</x-shared.button>
    </div>
</form>