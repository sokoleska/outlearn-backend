<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Load the JSON file
                $json = file_get_contents(database_path('jsonfiles/professors.json'));
                $professors = json_decode($json, true);
        
                // Insert each user into the database
                foreach ($professors as $professor) {
                    DB::table('professors')->insert([
                        'position' => $professor['position'],
                        'company' => $professor['company'],
                        'gender' => $professor['gender'],
                        'birth_date' => $professor['birth_date'],
                        'work_experience_years' => $professor['work_experience_years'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
    }
}
