<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Symfony\Component\Console\Input\Input;

class ClassroomStudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classrooms')->get();
        $classrooms = Classroom::with('students')->get();

        return view('admin.classrooms.students', compact(['students', 'classrooms']));
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
            'student_id' => 'required|unique:classroom_student',
        ], [
            'student_id.unique' => 'This student had already been taken in another class.'
        ]);

        foreach ($request->get('student_id') as $value) {
            $classroom = Classroom::find($attributes['classroom_id']);
            $insert_data = $classroom->students()->syncWithoutDetaching($value);
            if (!$insert_data) {
                return back()->with('failed', 'Something went wrong, try again.');
            }
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You added a new Student to the class.');
    }
}
