<div>
    <h6 class="font-bold">Exams</h6>
    @forelse($exams as $exam)
    {{$exam->title}}
    @empty
    Non exam yet
    @endforelse
    <div class="hover:text-blue-700">
        <a href="{{ route('exams.create') }}">
            New Exam
        </a>
    </div>
</div>