<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->orderBy('id')->get();

        return view('student-list', compact('students'));
    }

    public function create()
    {
        $courses = Course::orderBy('name')->get();

        return view('add-student', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'course' => 'nullable|exists:courses,id',
        ]);

        $validated['course_id'] = $request->input('course');
        $validated['status'] = 'active';
        unset($validated['course']);

        $student = Student::create($validated);
        $student->update(['student_id' => 'STU-' . str_pad((string) $student->id, 3, '0', STR_PAD_LEFT)]);

        return redirect()->route('students.index');
    }

    public function edit(string $id)
    {
        $student = Student::with('course')->findOrFail($id);
        $courses = Course::orderBy('name')->get();

        return view('edit-student', compact('student', 'courses'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive,graduated',
            'course' => 'nullable|exists:courses,id',
        ]);

        $validated['course_id'] = $request->input('course');
        unset($validated['course']);

        $student->update($validated);

        return redirect()->route('students.index');
    }
}
