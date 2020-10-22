@props(['on', 'reset'])
<div x-data="{ shown: false, timeout: null }" @if ($reset == 'no')
    x-init="@this.on('{{ $on }}', setTimeout(() => { setTimeout(() =>
    {shown = false;}, 3400); shown = true;}, 100) )"
@else
    x-init="@this.on('{{ $on }}', setTimeout(() => { setTimeout(() => { @this.resetAlert();}, 4500); setTimeout(() =>
    {shown = false;}, 3400); shown = true;}, 100) )"
    @endif
    :class="{ 'show': shown }" id="snackbar"
    {{ $attributes->merge(['class' => 'fixed flex visi bottom-0 mb-4 left-0 right-0 mx-auto font-bold w-max-content px-6 py-3 shadow-md']) }}>
    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
        </path>
    </svg>
    {{ $slot ?? 'Saved.' }}
</div>
