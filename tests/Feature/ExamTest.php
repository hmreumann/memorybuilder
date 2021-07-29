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
}
