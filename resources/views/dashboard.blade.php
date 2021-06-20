<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="md:flex md:h-screen">
        <div class="w-full md:w-64 p-6 bg-blue-200 border-r  border-gray-200">
            @livewire('exams')
        </div>
        
    </div>
</x-app-layout>