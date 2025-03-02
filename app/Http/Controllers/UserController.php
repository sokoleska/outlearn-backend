<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentInterest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\json;

class UserController extends Controller
{
    public function student_info()
    {
        $id = 2;
        // Fetch the user by ID
        $user = User::with('student.interests', 'student.achievements')->find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User  not found'], 404);
        }

        return response()->json($user);
    }

    public function leaderboard()
    {
        $students = DB::table('students')
            ->select('students.id', 'students.name', 
                DB::raw('COUNT(DISTINCT CASE WHEN student_progress.completed = true THEN student_progress.lesson_id END) as completed_courses_count'),
                DB::raw('COUNT(DISTINCT achievements_students.achievement_id) as achievements_count'))
            ->leftJoin('student_progress', 'students.id', '=', 'student_progress.user_id') // Assuming user_id is the foreign key in student_progress
            ->leftJoin('achievements_students', 'students.id', '=', 'achievements_students.student_id')
            ->groupBy('students.id', 'students.name')
            ->orderBy('completed_courses_count', 'desc')
            ->orderBy('achievements_count', 'desc')
            ->get();

        return response()->json($students);
    }

    public function get_courses()
    {
        $courses = Course::with('category')->orderBy('created_at', 'desc')->get();

        // Return the courses as a JSON response
        return response()->json($courses);
    }

    public function get_course($courseId)
    {
        // Fetch the course with its modules
        $course = Course::with('modules.lessons', 'professor', 'reviews.user')->find($courseId);

        // Check if the course exists
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        // Return the modules as a JSON response
        return response()->json($course);
    }
}
