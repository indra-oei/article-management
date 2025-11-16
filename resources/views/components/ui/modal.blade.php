<div 
    x-show="{{ $show }}" 
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center"
    aria-modal="true"
    role="dialog"
    x-cloak
    x-on:keydown.escape.window="$dispatch('close-modal')"
>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm transition duration-300" @click="$dispatch('close-modal')"></div>
    <div class="flex flex-col gap-6 relative z-10 bg-white rounded-xl p-4 pointer-events-auto">
        <div class="flex items-start gap-8">
            <div class="mr-4">
                <h1 class="text-lg font-bold text-gray-600" x-text="modalTitle"></h1>
                <h4 class="text-sm text-gray-400" x-text="modalSubtitle"></h4>
            </div>
            <button @click="$dispatch('close-modal')" class="p-2 bg-red-50 text-red-700 stroke-2 hover:bg-red-100 transitions duration-100 rounded cursor-pointer">
                <x-shared.icon name="close" />
            </button>
        </div>
        {{ $slot }}
    </div>
</div>