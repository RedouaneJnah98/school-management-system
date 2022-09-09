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
        $teachers = Teacher::all();
        $classrooms = Classroom::all();

        return view('admin.classrooms.teachers', compact(['teachers', 'classrooms']));
    }

    public function store(Request $request)
    {
        $classroom = Classroom::find($request->input('classroom_id'));
        $insert_data = $classroom->teachers()->syncWithoutDetaching($request->input('teacher_id'));

        if (!$insert_data) {
            return back()->with('failed', 'Something went wrong, try again.');
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You added new teacher to the classroom');
    }

    public function all_teachers()
    {
        //
    }
}
