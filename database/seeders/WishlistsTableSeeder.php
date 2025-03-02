<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/wishlists.json'));
        $wishlists = json_decode($json, true);

        // Insert each wishlist entry into the database
        foreach ($wishlists as $wishlist) {
            DB::table('wishlists')->insert([
                'user_id' => $wishlist['user_id'], // Ensure this ID exists in the users table
                'course_id' => $wishlist['course_id'], // Ensure this ID exists in the courses table
                'created_at' => now(),
            ]);
        }
    }
}
