<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsStudentTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/achievements_student.json'));
        $achievementsStudentData = json_decode($json, true);

        // Insert each achievement-student entry into the database
        foreach ($achievementsStudentData as $entry) {
            DB::table('achievements_student')->insert([
                'student_id' => $entry['student_id'], // Ensure this ID exists in the students table
                'achievement_id' => $entry['achievement_id'], // Ensure this ID exists in the achievements table
            ]);
        }
    }
}
