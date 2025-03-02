<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/questions.json'));
        $questions = json_decode($json, true);

        // Insert each question into the database
        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'quiz_id' => $question['quiz_id'], // Ensure this ID exists in the quizzes table
                'question_text' => $question['question_text'],
            ]);
        }
    }
}