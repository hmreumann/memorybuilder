<?php

namespace Tests\Feature;

use App\Models\Attachment;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AttachmentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_attachment_can_be_uploaded() {

        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $exam = Exam::factory()->create();

        Storage::fake('attachments');

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->actingAs($user)->post('/upload', [
            'file' => $file,
            'exam' => $exam->id,
        ]);

        //filename to store
        $filenametostore = 'photo_' . time() . '.jpg';

        Storage::disk('attachments')->assertExists($filenametostore);

        $this->assertCount(1, Attachment::all());
        $this->assertEquals($exam->id, Attachment::first()->exam_id);

    }

    /** @test */
    public function an_attachment_cannot_be_uploaded_without_exam_info () {

        $user = User::factory()->create();
        $exam = Exam::factory()->create();

        Storage::fake('attachments');

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->actingAs($user)
        ->post('/upload', [
            'file' => $file,
        ]);

        //filename to store
        $filenametostore = 'photo_' . time() . '.jpg';

        Storage::disk('attachments')->assertMissing($filenametostore);

        $this->assertCount(0, Attachment::all());

    }

    /** @test */
    public function an_attachment_can_be_retrieved() {

        Storage::fake('attachments');
        $user = User::factory()->create();
        $exam = Exam::factory()->create();
        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->actingAs($user)
        ->post('/upload', [
            'file' => $file,
            'exam' => $exam->id,
        ]);

        //filename to store
        $filenamestored = 'photo_' . time() . '.jpg';

        Storage::disk('attachments')->assertExists($filenamestored);

        $secondUser = User::factory()->create();
        $exam->sharedUsers()->attach($secondUser->id, ['permissions' => 'contribute']);

        $response = $this->actingAs($secondUser)
        ->get('/attachments/'.$filenamestored);

        $response->assertOk();
    }

    /** @test */
    public function if_attachment_doesnt_exist_throw_not_found() {

        $response = $this->actingAs(User::factory()->create())
        ->get('/attachments/'.'doesnt_exist.jpg');

        $response->assertNotFound();
    }
}
