<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Exam;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@user.com',    
            'password' => Hash::make('password')
        ]);

        $exam = Exam::factory()->count(2)
        ->for($user)->hasQuestions(10, [
            'user_id' => $user->id
        ])
        ->create();

    }
}
