<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        // $json = file_get_contents(database_path('jsonfiles/professors.json'));
        // $professors = json_decode($json, true);

        // // Insert each professor into the database
        // foreach ($professors as $professor) {
        //     DB::table('professors')->insert([
        //         'position' => $professor['position'],
        //         'company' => $professor['company'],
        //         'gender' => $professor['gender'], // Should be 'male' or 'female'
        //         'birth_date' => $professor['birth_date'],
        //         'work_experience_years' => $professor['work_experience_years'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        DB::table('professors')->insert([
            [
                'id' => 7,
                'user_id' => 7,
                'position' => 'Professor',
                'company' => 'University 7',
                'gender' => 'female',
                'birth_date' => '1974-02-27',
                'work_experience_years' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}