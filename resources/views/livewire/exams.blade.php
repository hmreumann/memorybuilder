<div>
    <h6 class="text-xs text-gray-600 mb-2">Exams</h6>
    @forelse($exams as $exam)
    <a href="{{route('exams.show',['exam'=>$exam])}}">{{$exam->title}}</a>
    @empty
    Non exam yet
    @endforelse
    <div class="hover:text-blue-700 text-blue-500 text-xs mt-2">
        <a href="{{ route('exams.create') }}">
            New Exam
        </a>
    </div>
</div>