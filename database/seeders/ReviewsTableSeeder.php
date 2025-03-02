<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/reviews.json'));
        $reviews = json_decode($json, true);

        // Insert each review into the database
        foreach ($reviews as $review) {
            DB::table('reviews')->insert([
                'user_id' => $review['user_id'], // Ensure this ID exists in the users table
                'course_id' => $review['course_id'], // Ensure this ID exists in the courses table
                'rating' => $review['rating'], // Should be an integer between 1 and 5
                'comment' => $review['comment'],
                'created_at' => now(),
            ]);
        }
    }
}
