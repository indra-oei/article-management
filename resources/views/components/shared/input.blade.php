<div class="relative w-full">
    @if ($icon)
        <x-shared.icon :name="$icon" width="15" height="15" class="absolute left-2 top-1/2 transform -translate-y-1/2" />
    @endif

    <input type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }} placeholder="{{ $placeholder }}" />

    @if ($type === 'password')
        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 cursor-pointer" type="button" onclick="togglePasswordVisibility(this)">
            <x-shared.icon name="eye" />
        </button>
    @endif
</div>

<script>
    function togglePasswordVisibility(button) {
        const input = button.previousElementSibling;
        if (input.type === 'password') {
            input.type = 'text';
            button.innerHTML = `<x-shared.icon name="eye-slash" />`;
        } else {
            input.type = 'password';
            button.innerHTML = `<x-shared.icon name="eye" />`;
        }
    }
</script>