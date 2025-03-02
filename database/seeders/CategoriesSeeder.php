<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/categories.json'));
        $categories = json_decode($json, true);

        // Insert each category into the database
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
            ]);
        }
    }
}
