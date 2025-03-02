<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/lessons.json'));
        $lessons = json_decode($json, true);

        // Insert each lesson into the database
        foreach ($lessons as $lesson) {
            DB::table('lessons')->insert([
                'module_id' => $lesson['module_id'], // Ensure this ID exists in the modules table
                'title' => $lesson['title'],
                'content' => $lesson['content'],
                'video_url' => $lesson['video_url'],
                'order_number' => $lesson['order_number'],
                'created_at' => now(),
            ]);
        }
    }
}