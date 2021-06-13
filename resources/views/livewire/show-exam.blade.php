<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex items-center">
            <div class="flex-grow">
                <div>
                    <div>{{$exam->description}}</div>
                    <div>Questions: {{$exam->questions->count()}}</div>
                </div>
            </div>
            <div class="flex-none mr-4">
                <form method="GET" action="{{route('questions.create')}}">
                    <input type="hidden" name="exam_id" value="{{$exam->id}}">
                    <x-jet-button>New Question</x-jet-button>
                </form>
            </div>
            <div class="flex-none">
                <a href="{{route('exams.edit',['exam'=>$exam])}}">Settings</a>
            </div>
        </div>

        <x-jet-section-border />

        @forelse($exam->questions as $question)
        <div class="flex flex-col mb-2">
            <div class="font-bold">{!!$question->statement!!}</div>
            <div class="p-4">{!!$question->answer!!}</div>
            <div class="flex justify-end text-xs text-gray-500 space-x-3">
                <div class="">{{$question->user->name}}</div>
                <div>Last Update: {{$question->updated_at}}</div>
                <div class="text-blue-400 hover:text-blue-700">
                    <a href="{{route('questions.edit',['question'=>$question])}}">Edit</a>
                </div>
            </div>
        </div>
        @empty
        Sin preguntas
        @endforelse

    </div>
</div>