<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomTeacherController extends Controller
{
    public function create()
    {
        $teachers = Teacher::with('classrooms')->get();
        $subjects = Subject::with('branch')->get();
        $classrooms = Classroom::with('students')->get();

        return view('admin.classrooms.teachers', compact(['teachers', 'subjects', 'classrooms']));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'classroom_id' => 'required|numeric',
            'teacher_id' => 'required|numeric',
            'subject_id' => 'required|numeric'
        ], [
            'classroom_id.required' => 'The classroom field is required',
            'teacher_id.required' => 'The teacher field is required',
            'subject_id.required' => 'The subject field is required'
        ]);

        $classroom = Classroom::find($attributes['classroom_id']);
        $insert_data = $classroom->teachers()->syncWithoutDetaching($attributes);

        if (!$insert_data) {
            return back()->with('failed', 'Something went wrong, try again.');
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You added new teacher to the classroom');
    }
}
