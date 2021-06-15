<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Test;

class ShowTest extends Component
{
    public Test $test;
    public $questions;

    public function mount(){
        $this->questions = $this->test->exam->questions->pluck('id','statement','answer');
    }

    public function render()
    {
        return view('livewire.show-test')
        ->layoutData(['header' => $this->test->exam->title]);
    }
}
