<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <div class="md:flex md:h-screen">
        <div class="w-full md:w-64 p-6 bg-blue-200 border-r  border-gray-200">
            @livewire('exams')
        </div>

        <div class="w-full sm:p-6">
            <form method="POST" action="{{ route('exams.store') }}" class="grid grid-cols-6 gap-6 ">
                @csrf

                <div class="col-span-6 sm:col-start-2 sm:col-span-4 bg-white">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="">
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="description" value="{{ __('Description') }}" />
                            <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" autofocus />
                        </div>
                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                        <x-jet-button class="">
                            {{ __('Create Exam') }}
                        </x-jet-button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>