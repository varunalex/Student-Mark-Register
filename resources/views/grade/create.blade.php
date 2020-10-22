<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Grade') }}
        </h2>
    </x-slot>

    <x-slot name="goTo">grade</x-slot>

    <livewire:grade-create />
</x-app-layout>
