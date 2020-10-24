@props(['disabled' => false, 'label', 'errorClass', 'message', 'options'])

<div class="mb-3">
    @if (!empty($label))
        <label class="block font-medium text-base text-gray-700" id="{{ $attributes['id'] }}">
            {{ $label ?? $slot }}
        </label>
    @endif
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'form-select h-full rounded-md
        shadow-sm',
        ]) !!}>
        <option>-- Select --</option>
        @if (is_object($options))
            @foreach ($options as $value)
                <option value="{{ $value->id }}">{{ $value->grade . '-' . $value->class }}</option>
            @endforeach
        @else
            @foreach ($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['name'])
    <p class="{{ $errorClass }} text-sm text-red-600 ml-1">{{ $message }}</p>
    @enderror
</div>
