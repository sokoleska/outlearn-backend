<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RolesTableSeeder::class,
            // UsersTableSeeder::class,
            // StudentsTableSeeder::class,
            // InterestsTableSeeder::class,
            // ProfessorsTableSeeder::class,
            // CategoriesTableSeeder::class,
            // CoursesTableSeeder::class,
            // ModulesTableSeeder::class,
            // LessonsTableSeeder::class,
            // QuizzesTableSeeder::class,
            // QuestionsTableSeeder::class,
            // AnswersTableSeeder::class,
            // ForumThreadsTableSeeder::class,
            // AchievementsTableSeeder::class,
            // AchievementsStudentTableSeeder::class, // may be some error here
            // ForumCommentsTableSeeder::class,
            // NewsletterSubscriptionsTableSeeder::class,
            // ReviewsTableSeeder::class,
            // StudentInterestsTableSeeder::class, // may be some error here
            StudentProgressTableSeeder::class, // may be some error here
            // WishlistsTableSeeder::class
        ]);
    }
}
