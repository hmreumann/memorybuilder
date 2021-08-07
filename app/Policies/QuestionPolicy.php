<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
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
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Question  Question
     * @return mixed
     */
    public function update(User $user, Question $question)
    {
        if($question->exam->user_id == $user->id){

            return true;

        }elseif($question->user_id == $user->id){

            //Check if the user is still being a Contributor

            foreach($question->exam->sharedUsers as $shared_users){

                if($shared_users->pivot->permissions == 'contribute' && $shared_users->id == $user->id){

                    return true;

                }

            }

        }
    }
}
