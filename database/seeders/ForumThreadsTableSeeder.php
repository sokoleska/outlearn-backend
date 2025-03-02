<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumThreadsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/forum_threads.json'));
        $forumThreads = json_decode($json, true);

        // Insert each forum thread into the database
        foreach ($forumThreads as $thread) {
            DB::table('forum_threads')->insert([
                'user_id' => $thread['user_id'], // Ensure this ID exists in the users table
                'title' => $thread['title'],
                'content' => $thread['content'],
                'created_at' => now(),
            ]);
        }
    }
}
