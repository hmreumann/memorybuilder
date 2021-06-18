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
    <div class="hover:text-blue-700 text-blue-500 text-xs mt-2">
        <a href="{{ route('exams.create') }}">
            New Exam
        </a>
    </div>

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
</div>