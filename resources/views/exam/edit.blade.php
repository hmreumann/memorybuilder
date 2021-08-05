<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <x-form-section action="{{ route('exams.update',$exam) }}" method="PUT">
                <x-slot name="title">
                    {{ __('Exam Details') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Ensure to input a title and a brief description.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title"
                            value="{{ old('title') ?? $exam->title }}" required autofocus />
                        <x-jet-input-error for="title" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description"
                            value="{{ old('description') ?? $exam->description }}" autofocus />
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-form-section>

            <x-jet-section-border />

            <livewire:share-exam :exam="$exam" />

            <x-jet-section-border />

            @can('delete',$exam)
            <livewire:delete-exam-section :exam="$exam" />
            @endcan

        </div>
    </div>
</x-app-layout>
