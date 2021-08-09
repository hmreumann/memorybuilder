<?php

use App\Http\Controllers\AttachmentsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\ShowTest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum', 'verified')->group(function () {

    // Panel (Dashboard)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Varios Resources
    Route::resources([
        'exams' => ExamController::class,
        'questions' => QuestionController::class,
    ]);

    Route::get('/test/create/{exam}', [TestController::class, 'create'])->name('tests.create');
    Route::get('/test/{test}', ShowTest::class)->name('tests.show');

    Route::post('upload', [AttachmentsController::class, 'upload']);
    Route::get('attachments/{attachment}', [AttachmentsController::class, 'view']);
});
