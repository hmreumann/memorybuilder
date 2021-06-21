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
        <div class=" m-6 space-y-6 flex-col">
            @forelse(auth()->user()->exams as $exam)
            <div class="bg-white rounded p-6 shadow">
                <div>
                    {{$exam->title}}
                </div>
                @if($exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first() !== null)
                <a href="{{route('tests.show',$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first())}}">
                    <div>
                        Tested {{$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first()->updated_at->diffForHumans()}}<br>
                        {{$exam->tests()->where('user_id',auth()->user()->id)->orderByDesc('updated_at')->first()->results_correct / $exam->questions->count() * 100 }} % Completed
                    </div>
                </a>

                @else
                <div>
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