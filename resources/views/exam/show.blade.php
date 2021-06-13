<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $exam->title }}
        </h2>
    </x-slot>

    <div>
        <livewire:show-exam :exam="$exam">
    </div>
</x-app-layout>