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

    /** @test */
    public function only_the_owner_of_the_exam_can_delete_the_user ()
    {
        $user = User::factory()->create();
        $exam = Exam::factory()->create();

        $this->assertCount(1, Exam::all());
        $second_user = User::factory()->create();
        $response = $this->actingAs($second_user)->delete('/exams/1')->assertStatus(403);

        $this->assertCount(1, Exam::all());
    }

    /** @test */
    public function the_delete_link_is_being_rendered ()
    {
        $user = User::factory()->create();
        $exam = Exam::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard')->assertSee('<form action="http://memorybuilder.devel/exams/1" method="POST">', false);

        $this->assertCount(1, Exam::all());
    }

    /** @test */
    public function the_delete_link_is_not_being_rendered_if_it_is_another_user ()
    {
        $user = User::factory()->create();
        $exam = Exam::factory()->create();

        $second_user = User::factory()->create();

        $second_user->sharedExams()->attach($exam->id);

        $response = $this->actingAs($second_user)->get('/dashboard')->assertDontSee('<form action="http://memorybuilder.devel/exams/1" method="POST">', false);

        $this->assertCount(1, Exam::all());
    }
}
