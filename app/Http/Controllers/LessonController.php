<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('module')->orderBy('order_number')->get();
        return view('admin.lessons.index', compact('lessons'));
    
    }

    
    public function create()
    {
        $courses = Course::all();
        $modules = Module::all();
        return view('admin.lessons.create', compact('courses', 'modules'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'order_number' => 'required|integer|min:1|unique:lessons,order_number,NULL,id,module_id,' . $request->module_id,
        ]);
    
        $lesson = Lesson::create($validated);
    
        return redirect()->route('admin.lessons.index')->with('message', 'Lesson created successfully!');
    }
    
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return response()->json($lesson);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'module_id' => 'sometimes|exists:modules,id',
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'video_url' => 'sometimes|url',
            'order_number' => 'sometimes|integer|min:1',
        ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->update($validated);

        return response()->json($lesson);
    }

    public function destroy($id)
    {
        Lesson::findOrFail($id)->delete();

        return response()->json(['message' => 'Lesson deleted successfully']);
    }
}
