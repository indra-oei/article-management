<li {{ $attributes->merge(['class' => $class]) }}>
    <a href="{{ $href }}" class="block px-4 py-2">
        <div class="flex items-center max-w-[120px] mx-auto gap-4">
            <x-shared.icon name="{{ $icon }}" :class="$iconClass" />
            <span>{{ $slot }}</span>
        </div>
    </a>
</li>