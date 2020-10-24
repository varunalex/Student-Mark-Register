<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <x-slot name="goTo">students</x-slot>

    <livewire:student-edit :student="$student" />
</x-app-layout>
