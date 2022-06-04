<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $classrooms = Classroom::all();

        return view('admin.classes.students', compact(['students', 'classrooms']));
    }

    public function all_students($id)
    {
        $classrooms = Classroom::find($id);

        return view('admin.students', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'classroom_id' => 'required|numeric',
            'student_id' => 'required|numeric',
        ]);

        $classroom = Classroom::find($attributes['classroom_id']);
        $insert_data = $classroom->students()->sync($attributes);

        if (!$insert_data) {
            return back()->with('failed', 'Something went wrong, try again.');
        }

        return to_route('admin.classes.index')->with('success', 'Success! You added a new Student to the class.');
    }
}
