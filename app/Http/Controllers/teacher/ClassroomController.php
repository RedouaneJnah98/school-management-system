<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(Classroom $classroom)
    {
        $classrooms = $classroom->all();

        return view('admin.classes.index', compact('classrooms'));
    }

    public function create(Teacher $teacher)
    {
        $teachers = $teacher->all();

        return view('admin.classes.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'branch' => 'required|unique:classrooms,branch',
            'year' => 'required',
            'teacher_id' => 'required',
            'status' => 'required',
            'remark' => 'required'
        ]);

        $insert_data = Classroom::create($attributes);

        if (!$insert_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }

        return redirect()->route('admin.classes.index')->with('success', 'Success! You added new class.');
    }

    public function edit(Classroom $classroom)
    {
        return view('admin.classes.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
