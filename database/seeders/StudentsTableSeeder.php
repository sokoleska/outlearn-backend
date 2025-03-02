<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudentsTableSeeder extends Seeder
{

    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/students.json'));
        $students = json_decode($json, true);

        // Insert each student into the database
        foreach ($students as $student) {
            DB::table('students')->insert([
                'gender' => $student['gender'], // Should be 'male' or 'female'
                'birth_date' => $student['birth_date'],
                'school_year' => $student['school_year'],
                'field_of_study' => $student['field_of_study'],
                'current_school' => $student['current_school'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
