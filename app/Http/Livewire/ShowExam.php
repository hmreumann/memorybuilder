<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowExam extends Component
{
    public $exam;
    public $test;
    public $finishedTest = false;

    public function mount(){
        $this->test = $this->exam->tests->where('user_id',auth()->user()->id)->sortByDesc('updated_at')->first();
        
        if(isset($this->test->correct_answers) && $this->exam->questions()->count() == $this->test->correct_answers){
            $this->finishedTest = true;
        }
    }
    
    public function render()
    {
        return view('livewire.show-exam');
    }
}
