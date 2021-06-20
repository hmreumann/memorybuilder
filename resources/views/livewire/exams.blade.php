<div>
    <h6 class="text-xs text-gray-600 mb-2">Exams</h6>
    <ul class="list-disc">
        @forelse($exams as $exam)
        <li class="">
            <a href="{{route('exams.show',['exam'=>$exam])}}">{{$exam->title}}</a><br>
        </li>
        @empty
        Non exam yet
        @endforelse
    </ul>

    @if($sharedExams->count() > 0)
    <h6 class="text-xs text-gray-600 mt-2">Shared Withyou:</h6>
    <ul class="list-disc">
        @forelse($sharedExams as $exam)
        <li class="">
            <a href="{{route('exams.show',['exam'=>$exam])}}">{{$exam->title}}</a><br>
        </li>
        @empty
        Non exam yet
        @endforelse
    </ul>
    @endif
    <div class="p-6 flex justify-center">
        <a href="{{ route('exams.create') }}">
            <div class="bg-gray-400 text-white rounded-xl hover:bg-gray-500 px-6 py-3 max-w-sm text-center text-lg">Create Questionarie</div>
        </a>
    </div>
</div>