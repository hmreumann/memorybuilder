<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $exam->title }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-4 bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" action="{{route('questions.store')}}">
        @csrf
            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
            <div class="">
                <x-jet-label for="statement" value="{{ __('Statement') }}" />
                <x-jet-input id="statement" class="block mt-1 w-full" type="text" name="statement" :value="old('statement')" required autofocus />
                <x-jet-input-error for="statement" />
            </div>
            <div class="mt-2">
                <x-jet-label for="content" value="{{ __('Answer') }}" />
                <input id="x" type="hidden" name="content">
                <trix-editor input="x" class="trix-content"></trix-editor>
                <x-jet-input-error for="content" />
            </div>
            <div class="flex text-right mt-2">
                <x-jet-button>Add Question</x-jet-button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        var action = "{{ env('APP_URL') }}"
        var exam = {{ $exam->id }}
    </script>
    <script type="text/javascript" src="{{ asset('js/attachments.js') }}"></script>
    @endpush

</x-app-layout>

