<div 
    x-data="{
        show: false
    }"
    x-on:show-loading.window="
        show = true;
    "
    x-on:hide-loading.window="
        show = false;
    "
    x-show="show"
    x-transition.opacity
    x-cloak
    class="fixed inset-0 bg-black/60 z-[9999]"
>
    <div class="h-full w-full flex items-center justify-center">
        <div class="animate-pulse">
            <img src="{{ asset('/images/LOGO_CODEBYIO.png') }}" class="h-[80px]" alt="Website Logo">
        </div>
    </div>
</div>