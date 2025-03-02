<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StudentsTableSeeder::class,
            RolesTableSeeder::class,
            InterestsTableSeeder::class,
            ProfessorsTableSeeder::class,
            CategoriesTableSeeder::class,
            AchievementsTableSeeder::class,
            AchievementsStudentTableSeeder::class,
            ForumCommentsTableSeeder::class,
            ReviewsSeeder::class,
            WishlistsSeeder::class,
            UsersTableSeeder::class,
            ForumThreadsTableSeeder::class,
            NewsletterSubscriptionsTableSeeder::class,
            StudentInterestsTableSeeder::class,
            StudentProgressSeeder::class,
            CoursesTableSeeder::class,
            QuizzesTableSeeder::class,
            ModulesTableSeeder::class,
            LessonsTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class
        ]);
    }
}
