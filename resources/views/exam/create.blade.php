<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exam') }}
        </h2>
    </x-slot>

    <div class="md:flex md:h-screen">
        <div class="w-full md:w-64 p-6 bg-blue-200 border-r  border-gray-200">
            @livewire('exams')

        </div>
        <div class="p-6">
            <h1 class="text-4xl font-bold mb-10">Create form</h1>
        </div>
    </div>
</x-app-layout>