<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumCommentsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/forum_comments.json'));
        $forumComments = json_decode($json, true);

        // Insert each forum comment into the database
        foreach ($forumComments as $comment) {
            DB::table('forum_comments')->insert([
                'thread_id' => $comment['thread_id'], // Ensure this ID exists in the forum_threads table
                'user_id' => $comment['user_id'], // Ensure this ID exists in the users table
                'content' => $comment['content'],
                'created_at' => now(),
            ]);
        }
    }
}