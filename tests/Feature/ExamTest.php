<?php

namespace Tests\Feature;

use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_exam_view_can_be_rendered ()
    {
        $user = User::factory()->create();
        $exam = Exam::factory()->create();
        $questions = Question::factory()->create(['exam_id'=>$exam->id]);
        $response = $this->actingAs($user)->get('/exams/1');
        $response->assertSessionHasNoErrors();
        $response->assertStatus(200);
    }

    /** @test */
    public function the_exam_and_its_questions_can_be_deleted ()
    {
        $user = User::factory()->create();
        $exam = Exam::factory()->create();

        $this->assertCount(1, Exam::all());
        $questions = Question::factory()->create(['exam_id'=>$exam->id]);
        $response = $this->actingAs($user)->delete('/exams/1');

        $this->assertCount(0, Exam::all());
        $this->assertCount(0, Question::all());
    }
}
