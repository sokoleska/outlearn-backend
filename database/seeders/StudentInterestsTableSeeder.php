<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentInterestsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/student_interests.json'));
        $studentInterestsData = json_decode($json, true);

        // Insert each student-interest entry into the database
        foreach ($studentInterestsData as $entry) {
            DB::table('student_interests')->insert([
                'student_id' => $entry['user_id'], // Ensure this ID exists in the students table
                'interest_id' => $entry['interest_id'], // Ensure this ID exists in the interests table
                'created_at' => now(),
            ]);
        }
    }
}