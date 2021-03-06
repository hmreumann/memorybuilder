<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Result;
use Livewire\Component;
use App\Models\Test;

class ShowTest extends Component
{
    use AuthorizesRequests;

    public Test $test;
    
    public $resultsCorrect;
    public $questions;
    public $selected;
    public $showAnswer = false;
    public $testCompleted = false;

    public function mount()
    {
        $this->authorize('view', $this->test);

        $this->questions = $this->test->exam->questions;
        
        $this->resultsCorrect = $this->test->results->where('result','correct')->pluck('question_id')->unique()->flatten();

        $this->questions = $this->questions->whereNotIn('id', $this->resultsCorrect);

        if($this->questions->count() > 0){

            $this->selected = $this->questions->random();
        }else{
            $this->testCompleted = true;
        }
    }

    public function showAnswer()
    {
        $this->showAnswer = true;
    }

    public function result($result)
    {
        $this->authorize('update', $this->test);

        Result::create([
            'test_id' => $this->test->id,
            'user_id' => auth()->user()->id,
            'question_id' => $this->selected->id,
            'result' => $result
        ]);
        
        if($result == 'correct')
        {
            $this->questions = $this->questions->whereNotIn('id',$this->selected->id);
            $this->resultsCorrect->push($this->selected->id);
            $this->test->correct_answers = $this->resultsCorrect->count();
            $this->test->save();
        }

        $this->newSelected();
    }

    public function newSelected(){
        if($this->questions->count() > 0){
            $this->selected = $this->questions->random();
            $this->showAnswer = false;
        }else{
            $this->testCompleted = true;
        }
    }

    public function render()
    {
        return view('livewire.show-test')
            ->layoutData(['header' => $this->test->exam->title]);
    }
}
