<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/answers.json'));
        $answers = json_decode($json, true);

        // Insert each answer into the database
        foreach ($answers as $answer) {
            DB::table('answers')->insert([
                'question_id' => $answer['question_id'], // Ensure this ID exists in the questions table
                'answer_text' => $answer['answer_text'],
                'is_correct' => $answer['is_correct'], // Boolean value
            ]);
        }
    }
}