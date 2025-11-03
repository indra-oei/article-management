<x-layout.admin.admin-layout title="Users">
    <x-slot name="pageTitle">
        <x-layout.admin.page-title title="Users" subtitle="Manage your authors and users" />
    </x-slot>
    
    <div class="text-right mb-3">
        <x-shared.button>Add User</x-shared.button>
    </div>
    <x-ui.table />
</x-layout.admin.admin-layout>