<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $exam->title }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <div class="flex-grow">
                    {{$exam->description}}
                </div>
                <div class="flex-none mr-4">
                    <form method="GET" action="{{route('questions.create')}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <input type="hidden" name="exam_id" value="{{$exam->id}}">
                        <x-jet-button>Nueva Pregunta</x-jet-button>
                    </form>
                </div>
                <div class="flex-none">
                    Configurar
                </div>
            </div>

            <x-jet-section-border />

            @forelse($exam->questions as $question)
            <div class="flex flex-col">
                <div>{{$question->statement}}</div>
                <div>{{$question->answer}}</div>
            </div>
            @empty
            Sin preguntas
            @endforelse

        </div>
    </div>
</x-app-layout>