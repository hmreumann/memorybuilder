<?php

namespace App\Listeners;

use App\Events\ExamShared;
use App\Mail\ExamShared as MailExamShared;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotificationToSharedUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExamShared  $event
     * @return void
     */
    public function handle(ExamShared $event)
    {
        Mail::to($event->user)->send(new MailExamShared($event->user, $event->exam));
    }
}
