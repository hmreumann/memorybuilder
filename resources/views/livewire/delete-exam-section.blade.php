<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Delete Exam') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Permanently delete this exam.') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('Once your exam is deleted, all of its resources and data will be permanently deleted. Before deleting this exam, please download any data or information that you wish to retain.') }}
            </div>

            <div class="mt-5">
                <x-jet-danger-button wire:click="confirmExamDeletion" wire:loading.attr="disabled">
                    {{ __('Delete Exam') }}
                </x-jet-danger-button>
            </div>

            <!-- Delete User Confirmation Modal -->
            <x-jet-dialog-modal wire:model="confirmingExamDeletion">
                <x-slot name="title">
                    {{ __('Delete Exam') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete this exam? Once this exam is deleted, all of its resources and data will be permanently deleted.') }}
                </x-slot>

                <x-slot name="footer">
                    <div class="flex justify-end">

                        <x-jet-secondary-button wire:click="$toggle('confirmingExamDeletion')"
                            wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <form action="{{ route('exams.destroy', $exam) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-jet-danger-button class="ml-2" type="submit">
                                {{ __('Delete Exam') }}
                            </x-jet-danger-button>
                        </form>
                    </div>
                </x-slot>
            </x-jet-dialog-modal>
        </x-slot>
    </x-jet-action-section>
</div>
