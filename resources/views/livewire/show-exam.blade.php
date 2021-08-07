<div>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-center items-center py-4 space-x-4 sm:justify-end">
            <div class="text-sm px-2 sm:px-0"><span class="font-bold">{{$exam->questions->count()}}</span> Questions
            </div>
            @can('storeQuestion',$exam)
            <div>
                <form method="GET" action="{{route('questions.create')}}">
                    <input type="hidden" name="exam_id" value="{{$exam->id}}">
                    <x-jet-button>New Question</x-jet-button>
                </form>
            </div>
            <div class="">
                <a href="{{route('exams.edit',['exam'=>$exam])}}">
                    <x-icon.cog class="text-gray-600" />
                </a>
            </div>
            @endcan
        </div>
        <div class="text-center mb-3">
            @if($exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first() !== null)
            <a
                href="{{route('tests.show',$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first())}}">
                <div class="text-green-500 hover:text-green-700">
                    Tested
                    {{$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first()->updated_at->diffForHumans()}}<br>
                    {{round($exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first()->correct_answers / $exam->questions->count() * 100) }}
                    % Completed
                </div>
            </a>
            <a href="{{route('tests.create',$exam)}}" class="text-gray-600 hover:text-gray-800">Start new test</a>
            @else
            <div class="text-green-500 hover:text-green-700">
                Not Yet Tested<br>
                <a href="{{route('tests.create',$exam)}}">Test now</a>
            </div>
            @endif
        </div>
        <div class="px-2  sm:px-0 flex flex-row items-center ">
            <div class="flex-grow">
                <div class="text-sm text-gray-500">Description:<br>{{$exam->description}}</div>
            </div>
        </div>
        <div class="px-2 py-4 sm:px-0">
            @forelse($exam->questions as $question)
            <div class="flex flex-col mb-4 p-1 sm:p-3 bg-white rounded shadow-md">
                <div class="font-bold">{!!$question->statement!!}</div>
                <div class="p-4 text-sm trix-content">{!!$question->answer!!}</div>
                <div class="flex justify-end text-xs text-gray-500 space-x-3 items-center">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $question->user->profile_photo_url }}" alt="{{ $question->user->name }}" />
                    @else
                    <div class="">{{$question->user->name}}</div>
                    @endif
                    <div>Last Update: {{$question->updated_at->diffForHumans()}}</div>
                    @can('update',$question)
                    <div class="text-blue-400 hover:text-blue-700">
                        <a href="{{route('questions.edit',['question'=>$question])}}">
                            <x-icon.edit />
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            @empty
            No questions
            @endforelse
        </div>

    </div>
</div>
