<button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
    @if ($icon)
        <x-shared.icon :name="$icon" class="!w-[12px] !h-[12px] stroke-2" />
    @endif
    
    {{ $slot }}
</button>