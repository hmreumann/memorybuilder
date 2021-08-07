<?php

namespace Tests\Feature;

use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_question_can_be_created_by_a_contributor ()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $exam = Exam::factory()->create(['user_id' => $user->id]);

        $second_user = User::factory()->create();

        $second_user->sharedExams()->attach($exam->id, ['permissions' => 'contribute']);

        $response = $this->actingAs($second_user)
        ->post('questions',[
            'exam_id' => $exam->id,
            'statement' => 'Como me llamo?',
            'content' => 'Hernán'
        ]);

        $this->assertCount(1, Question::all());
        $this->assertEquals($second_user->id, Question::first()->user_id);

    }
}
