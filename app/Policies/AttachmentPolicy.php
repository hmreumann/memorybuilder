<?php

namespace App\Policies;

use App\Models\Attachment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttachmentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attachment  $attachment
     * @return mixed
     */
    public function view(User $user, Attachment $attachment)
    {
        if($attachment->exam->user_id == $user->id){
            return true;
        }elseif($attachment->exam->sharedUsers->contains($user)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exam  $exam
     * @return mixed
     */
    public function delete(User $user, Attachment $attachment)
    {
        if($user->id == $attachment->exam->user_id){
            return true;
        }elseif($attachment->exam->sharedUsers->contains($user)){
            foreach($attachment->exam->sharedUsers as $sharedUser){
                if($sharedUser->pivot->permissions == 'contribute'){
                    return true;
                }
            }
        }else{
            return false;
        }
    }
}
