<x-layout.admin.admin-layout title="Users">
    <x-slot name="pageTitle">
        <x-layout.admin.page-title title="Users" subtitle="Manage authors and users" />
    </x-slot>
    
    <div x-data="{ modalOpen: false }" x-on:close-user-modal.window="modalOpen = false" class="mb-3">
        <div class="text-right">
            <x-shared.button @click="modalOpen = true">Add User</x-shared.button>
        </div>
        <x-ui.modal title="Add New User" subtitle="Manage user that will be able to use this application" :show="'modalOpen'" :close="'modalOpen = false'">
            <livewire:admin.user.user-form />
        </x-ui.modal>
    </div>
    <x-ui.table />
</x-layout.admin.admin-layout>