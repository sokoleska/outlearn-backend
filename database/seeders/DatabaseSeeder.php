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
            StudentsTableSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            InterestsTableSeeder::class,
            ProfessorsTableSeeder::class,
            CoursesTableSeeder::class,
            ModulesTableSeeder::class,
            CategoriesTableSeeder::class,
            LessonsTableSeeder::class,
            QuizzesTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class,
            ForumThreadsTableSeeder::class,
            AchievementsTableSeeder::class,
            AchievementsStudentTableSeeder::class,
            ForumCommentsTableSeeder::class,
            NewsletterSubscriptionsTableSeeder::class,
            ReviewsSeeder::class,
            StudentInterestsTableSeeder::class,
            StudentProgressSeeder::class,
            WishlistsSeeder::class
        ]);
    }
}
