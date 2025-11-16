<x-layout.admin.admin-layout title="Users">
    <x-slot name="pageTitle">
        <x-layout.admin.page-title title="Users" subtitle="Manage authors and users" />
    </x-slot>
    
    <div 
        x-data="{
            modalOpen: false,
            modalTitle: 'Add New User',
            modalSubtitle: 'Manage user that will be able to use this application',
            selectedUser: null
        }" 
        x-on:edit-user.window="
            modalOpen = true;
            modalTitle = 'Edit User';
            selectedUser = $event.detail[0]
        "
        x-on:close-modal.window="
            modalOpen = false;
            modalTitle = 'Add New User';
            selectedUser = null;
            $dispatch('clear-user-form')
        "
        class="mb-3"
    >
        <div class="flex justify-end">
            <x-shared.button @click="modalOpen = true">Add User</x-shared.button>
        </div>
        <x-ui.modal x-bind:title="modalTitle" x-bind:subtitle="modalSubtitle" :show="'modalOpen'">
            <livewire:admin.user.user-form />
        </x-ui.modal>
    </div>
    <livewire:admin.user.user-table wire:key='user-table' />
</x-layout.admin.admin-layout>