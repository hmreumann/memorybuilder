<?php

namespace App\Events;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamShared
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $exam;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Exam $exam)
    {
        $this->user = $user;
        $this->exam = $exam;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
