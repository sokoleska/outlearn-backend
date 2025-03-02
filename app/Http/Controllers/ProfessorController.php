<?php

namespace App\Http\Controllers;

use App\Models\Professor;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
   
    public function index() {
        $professors = Professor::with('users')->get();
        // $professors = User::all();
        return view('admin.professors.index', compact('professors'));
    }
    
    public function create()
    {
        return view('admin.professors.create');

    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'position' => 'required|string',
                'company' => 'nullable|string',
                'gender' => 'nullable|in:male,female,other',
                'birth_date' => 'required|date',
                'work_experience_years' => 'nullable|integer|min:0|max:60',
            ]);
    
            // Create user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make('defaultpassword123'),
                'role_id' => 2,
                'profile_picture' => null,
            ]);

            // Create professor
            $professor = Professor::create([
                'user_id' => $user->id, // Added user_id reference
                'position' => $validated['position'],
                'company' => $validated['company'] ?? null,
                'gender' => $validated['gender'] ?? null,
                'birth_date' => $validated['birth_date'], // Added birth_date
                'work_experience_years' => $validated['work_experience_years'] ?? null,
            ]);
    
            return redirect()->route('admin.professors.index')->with('message', 'Professor created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    
    public function edit($id)
    {
        $professor = Professor::with('user')->findOrFail($id);
        return view('admin.professors.edit', compact('professor'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'position' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'gender' => 'nullable|string|in:male,female,other',
        'work_experience_years' => 'nullable|integer|min:0|max:60',
    ]);

    $professor = Professor::findOrFail($id);
    $user = $professor->user;

    // Update user details
    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
    ]);

    // Update professor details
    $professor->update([
        'position' => $validated['position'],
        'company' => $validated['company'],
        'gender' => $validated['gender'],
        'work_experience_years' => $validated['work_experience_years'],
    ]);

    return redirect()->route('admin.professors.index')->with('message', 'Professor updated successfully');
}

public function show($id)
{
    $professor = Professor::with('user')->findOrFail($id);
    return view('admin.professors.show', compact('professor'));
}

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->user->delete();
        $professor->delete();

        return redirect()->route('admin.professors.index')->with('message', 'Professor deleted successfully');
    }
}
