<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Exam;
use App\Events\ExamShared;

class ShareExam extends Component
{
    public $users;
    public Exam $exam;
    public $sharedUsers;
    public $searchUser;

    public function mount()
    {
        $this->sharedUsers = $this->exam->sharedUsers()->get();
    }

    public function updatedSearchUser()
    {

        if ($this->searchUser == '') {
            $this->users = null;
        } else {

            $users = User::where('email', 'like', $this->searchUser . '%')->whereNotIn('id', collect($this->exam->user_id));

            if (isset($this->sharedUsers)) {
                foreach ($this->sharedUsers as $user) {
                    $users->whereNotIn('id', collect($user->id));
                }
            }

            $this->users = $users->take(5)->get();
        }
    }

    public function shareWith(User $user)
    {
        $user->sharedExams()->attach($this->exam->id);
        ExamShared::dispatch($user, $this->exam);
        $this->searchUser = '';
        $this->sharedUsers = $this->exam->sharedUsers()->get();
        $this->users = null;
    }

    public function stopSharingTo(User $user){
        $user->sharedExams()->detach($this->exam->id);
        $this->sharedUsers = $this->exam->sharedUsers()->get();
    }

    public function render()
    {
        return view('livewire.share-exam');
    }
}
