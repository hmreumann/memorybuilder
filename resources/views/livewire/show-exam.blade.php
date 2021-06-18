<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="px-2  sm:px-0 flex flex-row items-center mt-2 sm:mt-6">
            <div class="flex-grow">
                <div class="text-sm text-gray-500">{{$exam->description}}</div>
            </div>
            <div class="flex-none">
                <a href="{{route('exams.edit',['exam'=>$exam])}}">
                    <x-icon.cog class="text-gray-600" />
                </a>
            </div>
        </div>
        <div class="text-sm px-2 sm:px-0"><span class="font-bold">{{$exam->questions->count()}}</span> Questions</div>
        <x-jet-section-border />
        <div class="flex flex-col sm:flex-row mx-2 sm:mx-0">
            <div class="flex-auto">
                <div class="text-xs text-gray-500">Last practice:</div>
                <div class="flex flex-col">
                    @isset($test)
                    <div>
                        {{$test->updated_at->diffForHumans()}}

                        @if($finishedTest)<span class="text-green-500">Finished</span>@endif <a href="{{route('tests.show',$test)}}" class="text-blue-500 hover:text-blue-700">Continue Test</a>
                    </div>
                    @endisset
                    @empty($test)
                    Not yet tested
                    @endempty
                </div>
            </div>
            <div class="text-xs sm:text-right flex-auto">
                <a href="{{ route('tests.create',['exam'=>$exam]) }}" class="text-blue-500 hover:text-blue-700">Start a New Test</a>
            </div>
        </div>
        <x-jet-section-border />
        <div class="px-2 sm:px-0">
            @forelse($exam->questions as $question)
            <div class="flex flex-col mb-4 p-1 sm:p-3 bg-white rounded shadow-md">
                <div class="font-bold">{!!$question->statement!!}</div>
                <div class="p-4 text-sm trix-content">{!!$question->answer!!}</div>
                <div class="flex justify-end text-xs text-gray-500 space-x-3">
                    <div class="">{{$question->user->name}}</div>
                    <div>Last Update: {{$question->updated_at}}</div>
                    <div class="text-blue-400 hover:text-blue-700">
                        <a href="{{route('questions.edit',['question'=>$question])}}">
                            <x-icon.edit />
                        </a>
                    </div>
                </div>
            </div>
            @empty
            No questions
            @endforelse
        </div>
        <div class="flex justify-center">
            <div>
                <form method="GET" action="{{route('questions.create')}}">
                    <input type="hidden" name="exam_id" value="{{$exam->id}}">
                    <x-jet-button>New Question</x-jet-button>
                </form>
            </div>
        </div>
    </div>
</div>