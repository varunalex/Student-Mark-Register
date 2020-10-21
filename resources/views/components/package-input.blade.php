@props(['disabled' => false, 'label', 'errorClass', 'message'])

<div class="mb-3">
    @if (!empty($label))
        <label class="block font-medium text-base text-gray-700" id="{{ $attributes['id'] }}">
            {{ $label ?? $slot }}
        </label>
    @endif
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm']) !!}
    >
    @error($attributes['id'])
    <p class="{{ $errorClass }} text-sm text-red-600 ml-1">{{ $message }}</p>
    @enderror
</div>
