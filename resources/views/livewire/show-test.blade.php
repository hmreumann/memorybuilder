<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="px-4">
        <div class="flex">
            <div class="flex-1">
                <div class="text-xs text-gray-600">Number of Questions:</div>
                <div class="font-bold text-gray-800">
                    {{ $test->exam->questions->count() }}
                </div>
            </div>
            <div class="flex-1">
                <div class="text-xs text-gray-600">Correct:</div>
                <div class="font-bold text-green-800">
                    {{ $resultsCorrect->count() }}
                </div>
            </div>
            <div class="flex-1 ">
                <div class="text-xs text-gray-600">Questions Remaining to Memorize:</div>
                <div class="font-bold text-blue-500">
                    {{ $questions->count() }}
                </div>
            </div>
        </div>
        @if($testCompleted == false)
        <div class="mt-4 bg-white rounded shadow-sm p-2">
            <div class="text-xs text-gray-600">Statement:</div>
            <div class="font-bold text-gray-800">
                {!! $selected->statement !!}
            </div>
            <div class="flex justify-center mt-4 {{ $showAnswer ? 'hidden' : '' }}">
                <x-jet-button wire:click="showAnswer" class="mw-full text-center">Show Answer</x-jet-button>
            </div>
        </div>
        <div class="{{ $showAnswer ? '' : 'hidden' }} space-y-4 bg-white rounded shadow-sm p-2 mt-6">
            <div class="text-xs text-gray-600">Answer:</div>
            <div>{!! $selected->answer !!}</div>
            <div class="flex p-4 space-x-10">
                <div wire:click="result('correct')" class="flex-1 text-center p-4 rounded text-white bg-green-500 hover:bg-green-600 cursor-pointer">Correct</div>
                <div wire:click="result('notyetmemorized')" class="flex-1 text-center p-4 rounded text-white bg-blue-500 hover:bg-blue-600 cursor-pointer">Not Yet Memorized</div>
            </div>
        </div>
        @else
        <div class="mw-full text-green-700 font-bold text-center p-20">Congratulations, you've memorized all the answers.</div>
        @endif
    </div>
</div>