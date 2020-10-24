<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a Student') }}
        </h2>
    </x-slot>

    <x-slot name="goTo">students</x-slot>

    <livewire:student-create />
</x-app-layout>
