<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use Livewire\Component;

class DeleteExamSection extends Component
{
    public $confirmingExamDeletion = false;
    public Exam $exam;

    public function confirmExamDeletion(){ $this->confirmingExamDeletion = true; }

    public function render()
    {
        return view('livewire.delete-exam-section');
    }
}
