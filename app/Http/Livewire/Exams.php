<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Exams extends Component
{
    public $exams;
    public $sharedExams;

    public function mount(){
        $this->exams = auth()->user()->exams;
        $this->sharedExams = auth()->user()->sharedExams;
    }

    public function render()
    {
        return view('livewire.exams');
    }
}
