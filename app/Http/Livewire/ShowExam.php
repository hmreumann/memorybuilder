<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowExam extends Component
{
    public $exam;
    
    public function render()
    {
        return view('livewire.show-exam');
    }
}
