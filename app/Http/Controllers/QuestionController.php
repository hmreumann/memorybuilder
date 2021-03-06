<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Exam;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $exam = Exam::find($request->exam_id);

        $this->authorize('storeQuestion', $exam);

        return view('question.create', compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'integer|required',
            'statement' => 'required',
            'content' => 'required'
        ]);

        $exam = Exam::find($request->exam_id);

        $this->authorize('storeQuestion', $exam);

        $question = Question::create([
            'exam_id' => $exam->id,
            'user_id' => auth()->user()->id,
            'statement' => $request->statement,
            'answer' => $request->content
        ]);

        return redirect()->route('exams.show', ['exam' => $exam]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        $exam = $question->exam;

        return view('question.edit', compact('question', 'exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);

        $request->validate([
            'statement' => 'required',
            'content' => 'required'
        ]);

        $question->update([
            'statement' => $request->statement,
            'answer' => $request->content
        ]);

        return redirect()->route('exams.show', ['exam' => $question->exam_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
