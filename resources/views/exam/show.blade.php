<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="flex-grow">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $exam->title }}
                </h2>
            </div>

        </div>
    </x-slot>

    <div>
        <livewire:show-exam :exam="$exam">
    </div>
</x-app-layout>