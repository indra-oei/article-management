<span {{ $attributes->merge(['class' => $class]) }}>
    @includeIf('components.shared.icons.' . $name . '-icon')
</span>