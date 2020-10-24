<div {{ $attributes->merge(['class' => '']) }}>
    <div class="bg-gray-200 px-6 py-3">
        @if (isset($title))
            <h3 class="text-xl py-1 font-bold">{{ $title }}</h3>
        @endif
        @if (isset($description))
            <p class="pt-1 pb-2 text-gray-800">{{ $description }}</p>
        @endif
    </div>
    <div class="px-6 py-4">
        {{ $form }}
    </div>
</div>
