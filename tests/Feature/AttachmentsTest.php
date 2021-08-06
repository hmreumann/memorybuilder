<?php

namespace Tests\Feature;

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

        Storage::fake('attachments');

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->actingAs(User::factory()->create())
        ->post('/upload', [
            'file' => $file
        ]);

        //filename to store
        $filenametostore = 'photo_' . time() . '.jpg';

        Storage::disk('attachments')->assertExists($filenametostore);
    }

    /** @test */
    public function an_attachment_can_be_retrieved() {

        $this->withoutExceptionHandling();

        Storage::fake('attachments');

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->actingAs(User::factory()->create())
        ->post('/upload', [
            'file' => $file
        ]);

        //filename to store
        $filenamestored = 'photo_' . time() . '.jpg';

        Storage::disk('attachments')->assertExists($filenamestored);

        $response = $this->actingAs(User::factory()->create())
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
