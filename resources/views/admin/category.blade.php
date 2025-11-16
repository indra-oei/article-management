<x-layout.admin.admin-layout title="Category">
    <x-slot name="pageTitle">
        <x-layout.admin.page-title title="Category" subtitle="Manage articles categories" />
    </x-slot>
    
    <div 
        x-data="{
            modalOpen: false,
            modalTitle: 'Add New Category',
            modalSubtitle: 'Manage category that will be used in article',
            selectedUser: null
        }" 
        x-on:edit-category.window="
            modalOpen = true;
            modalTitle = 'Edit User';
            selectedUser = $event.detail[0]
        "
        x-on:close-modal.window="
            modalOpen = false;
            modalTitle = 'Add New Category';
            selectedUser = null;
            $dispatch('clear-user-form')
        "
        class="mb-3"
    >
        <div class="flex justify-end">
            <x-shared.button @click="modalOpen = true">Add Category</x-shared.button>
        </div>
        <x-ui.modal x-bind:title="modalTitle" x-bind:subtitle="modalSubtitle" :show="'modalOpen'">
            <livewire:admin.category.category-form />
        </x-ui.modal>
    </div>
    <livewire:admin.category.category-table wire:key='category-table' />
</x-layout.admin.admin-layout>