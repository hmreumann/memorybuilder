<?php

namespace App\Mail;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamShared extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $exam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Exam $exam)
    {
        $this->user = $user;
        $this->exam = $exam;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->exam->user->name . ' has shared an exam with you.')->markdown('emails.exams.shared');
    }
}
