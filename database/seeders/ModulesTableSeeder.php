<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/modules.json'));
        $modules = json_decode($json, true);

        // Insert each module into the database
        foreach ($modules as $module) {
            DB::table('modules')->insert([
                'course_id' => $module['course_id'], // Ensure this ID exists in the courses table
                'name' => $module['name'],
                'order' => $module['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}