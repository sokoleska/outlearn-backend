<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/quizzes.json'));
        $quizzes = json_decode($json, true);

        // Insert each quiz into the database
        foreach ($quizzes as $quiz) {
            DB::table('quizzes')->insert([
                'course_id' => $quiz['course_id'], // Ensure this ID exists in the courses table
                'title' => $quiz['title'],
                'difficulty' => $quiz['difficulty'], // Should be one of 'medium', 'hard', 'easy'
            ]);
        }
    }
}