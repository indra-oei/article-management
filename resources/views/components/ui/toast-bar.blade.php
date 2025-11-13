<div 
    x-data="{ show: false, message: '', type: 'info' }"
    x-on:toast.window="
        message = $event.detail[0].message || '';
        type = $event.detail[0].type || 'info';
        show = true;
        setTimeout(() => show = false, 3000);
    "
    x-show="show"
    x-transition
    x-bind:class="{
        'bg-green-400': type === 'success',
        'bg-red-400': type === 'error',
        'bg-yellow-400': type === 'warning',
        'bg-cyan-400': type === 'info'
    }"
    x-cloak
    class="fixed bottom-4 right-4 text-white px-4 py-2 rounded shadow z-50 flex items-center gap-3 bg-cyan-400"
>
    <template x-if="type === 'success'">
        <x-shared.icon name="success" class="w-5 h-5 stroke-2" />
    </template>
    <template x-if="type === 'error'">
        <x-shared.icon name="error" class="w-5 h-5 stroke-2" />
    </template>
    <template x-if="type === 'warning'">
        <x-shared.icon name="warning" class="w-5 h-5 stroke-2" />
    </template>
    <template x-if="type === 'info'">
        <x-shared.icon name="info" class="w-5 h-5 stroke-2" />
    </template>

    <span x-text="message" class="text-sm">User created successfully!</span>
</div>