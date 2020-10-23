<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subject') }}
        </h2>
    </x-slot>

    <x-slot name="goTo">subject</x-slot>

    <livewire:subject-edit :subject="$subject" />
</x-app-layout>
