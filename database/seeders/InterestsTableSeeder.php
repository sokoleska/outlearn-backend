<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/interests.json'));
        $interests = json_decode($json, true);

        // Insert each interest into the database
        foreach ($interests as $interest) {
            DB::table('interests')->insert([
                'name' => $interest['name'],
            ]);
        }
    }
}