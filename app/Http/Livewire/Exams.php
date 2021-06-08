<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Exams extends Component
{
    public $exams;

    public function mount(){
        $this->exams = auth()->user()->exams;
    }

    public function render()
    {
        return view('livewire.exams');
    }
}
