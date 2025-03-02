<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/courses.json'));
        $courses = json_decode($json, true);

        // Insert each course into the database
        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'title' => $course['title'],
                'description' => $course['description'],
                'instructor_id' => $course['instructor_id'], // Ensure this ID exists in the professors table
                'category_id' => $course['category_id'], // Ensure this ID exists in the categories table
                'created_at' => now(),
            ]);
        }
    }
}