<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="md:flex md:h-screen">
        <div class="w-full md:w-64 p-6 bg-blue-200 border-r  border-gray-200">
            <h6 class="font-bold">Exams</h6>
            @forelse($exams as $exam)
            {{$exam->title}}
            @empty
            Non exam yet
            @endforelse
            <div>New Exam</div>

        </div>
        <div class="p-6">
            <h1 class="text-4xl font-bold mb-10">Content</h1>
        </div>
    </div>
</x-app-layout>