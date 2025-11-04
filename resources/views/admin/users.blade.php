<x-layout.admin.admin-layout title="Users">
    <x-slot name="pageTitle">
        <x-layout.admin.page-title title="Users" subtitle="Manage authors and users" />
    </x-slot>
    
    <div x-data="{ modalOpen: false }" class="text-right mb-3">
        <x-shared.button @click="modalOpen = true">Add User</x-shared.button>
        <x-ui.modal title="Add New User" subtitle="Manage user that will be able to use this application" :show="'modalOpen'" :close="'modalOpen = false'">
            Modal Here
        </x-ui.modal>
    </div>
    <x-ui.table />
</x-layout.admin.admin-layout>