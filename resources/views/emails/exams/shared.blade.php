@component('mail::message')
# Hallo {{ $user->name }}

{{ $exam->user->name }} has shared an exam with you, related to "{{ $exam->title }}".

@component('mail::button', ['url' => route('exams.show', $exam)])
View Exam
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
