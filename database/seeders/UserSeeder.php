<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Load the JSON file
        $json = file_get_contents(database_path('jsonfiles/users.json'));
        $users = json_decode($json, true);

        // Insert each user into the database
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password_hash' => Hash::make($user['password_hash']), // Hash the password
                'role_id' => $user['role_id'],
                'profile_picture' => $user['profile_picture'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
