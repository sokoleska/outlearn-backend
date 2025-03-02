<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Professor;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('professors')->get();
        return view('admin.courses.index', compact('courses'));
    }
    
    public function create()
    {
        $categories = Category::all();
        $users = Professor::with('user')->get();
        return view('admin.courses.create', compact('categories', 'users')); 
    }


    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all(); 
        $users = User::all();
        return view('admin.courses.update', compact('course', 'categories', 'users'));  
    }
    
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:professors,id', 
            'category_id' => 'required|exists:categories,id',
        ]);

        Course::create($validated);
        return redirect()->route('admin.courses.index')->with('message', 'Course created successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}

public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:professors,id', 
            'category_id' => 'required|exists:categories,id',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('message', 'Course updated successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}

    
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('admin.courses.index')->with('message', 'Course deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->get();

        return view('admin.courses.index', compact('courses'));
    }
}
