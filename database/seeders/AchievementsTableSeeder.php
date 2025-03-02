<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/achievements.json'));
        $achievements = json_decode($json, true);

        // Insert each achievement into the database
        foreach ($achievements as $achievement) {
            DB::table('achievements')->insert([
                'name' => $achievement['name'],
                'description' => $achievement['description'],
            ]);
        }
    }
}