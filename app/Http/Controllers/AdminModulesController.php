<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class AdminModulesController extends Controller
{
    public function index(Course $course)
    {
        $modules = $course->modules()->orderBy('order')->get();
        return view('admin.modules.index', compact('course', 'modules'));
    }

    public function create(Course $course)
    {
        $courses = Course::all();
        return view('admin.modules.create', compact('course', 'courses'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer|min:1|unique:modules,order,NULL,id,course_id,'.$course->id,
        ]);

        $course->modules()->create($validated);

        return redirect()->route('admin.modules.index', $course)->with('message', 'Module created successfully!');
    }

    public function edit(Course $course, Module $module)
    {
        $courses = Course::all();
        return view('admin.modules.edit', compact('course', 'module', 'courses'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer|min:1|unique:modules,order,'.$module->id.',id,course_id,'.$course->id,
        ]);

        $module->update($validated);

        return redirect()->route('admin.modules.index', $course)->with('message', 'Module updated successfully!');
    }

    public function destroy(Course $course, Module $module)
    {
        $module->delete();
        return redirect()->route('admin.modules.index', $course)->with('message', 'Module deleted successfully!');
    }
}
