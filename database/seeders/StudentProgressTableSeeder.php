<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/student_progress.json'));
        $studentProgressData = json_decode($json, true);

        $studentsJson = file_get_contents(database_path('jsonfiles/students.json'));
        $studentsJson = json_decode($studentsJson, true);
        $lessonsJson = file_get_contents(database_path('jsonfiles/lessons.json'));
        $lessonsJson = json_decode($lessonsJson, true);

        $studentIds = [];
        foreach($studentsJson as $student) {
            $studentIds[] = $student['id'];
        }

        $lessonIds = [];
        foreach($lessonsJson as $lesson) {
            $lessonIds[] = $lesson['id'];
        }


       
        DB::table('student_progress')->truncate();

        

        // Insert each student progress entry into the database
        foreach ($studentProgressData as $progress) {
            if(!in_array($progress['user_id'], $studentIds) || !in_array($progress['lesson_id'], $lessonIds)) {
                continue;
            }


            DB::table('student_progress')->insert([
                'student_id' => $progress['user_id'], // Ensure this ID exists in the students table
                'lesson_id' => $progress['lesson_id'], // Ensure this ID exists in the lessons table
                'completed' => $progress['completed'], // Boolean value
                'progress_percentage' => $progress['progress_percentage'], // Integer value
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
