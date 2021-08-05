<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Share the Exam') }}
        </x-slot>

        <x-slot name="description">
            {{ __('You can share this exam with other users, search them by email.') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div class="text-sm text-gray-700">Shared with:</div>
                <div class="text-xs p-2 sm:text-sm">
                    @isset($sharedUsers)
                    @foreach ($sharedUsers as $user)
                    {{$user->name}} ({{ $user->email }}) <span wire:click="stopSharingTo({{$user}})" class="text-blue-500 hover:text-blue-700 cursor-pointer">Remove</span><br>
                    @endforeach
                    @endisset
                </div>
            </div>
            <div class="mt-3">
                <x-jet-label for="searchUser">Share with other user:</x-jet-label>
                <x-jet-input wire:model="searchUser" id="searchUser" class="block mt-1 w-full" type="text" />
                <div class="text-xs p-2 sm:text-sm">
                    @isset($users)
                    @foreach ($users as $user)
                    {{$user->name}} ({{ $user->email }}) <span wire:click="shareWith({{$user}})" class="text-blue-500 hover:text-blue-700 cursor-pointer">Add</span><br>
                    @endforeach
                    @endisset
                </div>
            </div>
        </x-slot>
    </x-jet-action-section>
</div>
