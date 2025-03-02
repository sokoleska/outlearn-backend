<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/student_progress.json'));
        $studentProgressData = json_decode($json, true);

        // Insert each student progress entry into the database
        foreach ($studentProgressData as $progress) {
            DB::table('student_progress')->insert([
                'user_id' => $progress['user_id'], // Ensure this ID exists in the students table
                'lesson_id' => $progress['lesson_id'],
                'completed' => (bool) $progress['completed'], // Ensure boolean format
                'progress_percentage' => (int) $progress['progress_percentage'], // Ensure integer format
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
