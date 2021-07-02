<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col justify-center">
        <div class="px-6 pt-6 flex justify-center">
            <a href="{{ route('exams.create') }}">
                <div class="bg-gray-400 text-white rounded-xl hover:bg-gray-500 px-6 py-3 max-w-sm text-center text-lg">Create Questionarie</div>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 p-6 place-content-start">
            @forelse(auth()->user()->exams->merge(auth()->user()->sharedExams) as $exam)
            <div class="bg-white rounded p-6 shadow">
                <div class="font-bold hover:text-gray-700">
                    <a href="{{ route('exams.show',$exam)}}">{{$exam->title}}</a>
                </div>
                <div class="text-gray-700">
                    Questions: {{$exam->questions->count()}}
                </div>
                @if($exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first() !== null)
                <a href="{{route('tests.show',$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first())}}">
                    <div class="text-green-500 hover:text-green-700">
                        Tested {{$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first()->updated_at->diffForHumans()}}<br>
                        {{round($exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first()->correct_answers / $exam->questions->count() * 100) }} % Completed
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
            @empty
            <div>
                Your activity will be shown here.
            </div>
            @endforelse
        </div>

    </div>
</x-app-layout>