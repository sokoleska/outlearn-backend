<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsletterSubscriptionsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/newsletter_subscriptions.json'));
        $subscriptions = json_decode($json, true);

        // Insert each subscription into the database
        foreach ($subscriptions as $subscription) {
            DB::table('newsletter_subscriptions')->insert([
                'user_id' => $subscription['user_id'], // Ensure this ID exists in the users table
                'email' => $subscription['email'],
                'subscribed_at' => now(), // You can also use $subscription['subscribed_at'] if provided in JSON
            ]);
        }
    }
}
