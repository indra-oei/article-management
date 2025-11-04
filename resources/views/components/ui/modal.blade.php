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
>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm transition duration-300" @click="{{ $close }}"></div>
    <div class="flex flex-col gap-4 relative z-10 bg-white rounded-xl p-4 pointer-events-auto">
        <div class="flex flex-col items-start">
            <h1 class="text-lg font-black text-gray-600">{{ $title }}</h1>
            <h4 class="text-md text-gray-400">{{ $subtitle }}</h4>
        </div>
        {{ $slot }}
    </div>
</div>