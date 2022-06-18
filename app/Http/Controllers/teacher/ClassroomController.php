<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('students')->get();

        return view('admin.classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        $teachers = Teacher::with('classrooms')->get();
        $branches = Branch::with('classrooms')->get();
        $grades = Grade::with('classrooms')->get();

        return view('admin.classrooms.create', compact(['teachers', 'branches', 'grades']));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'branch_id' => 'required|numeric',
            'grade_id' => 'required|numeric|unique:classrooms',
//            'teacher_id' => 'required',
            'year' => 'required',
            'status' => 'required',
            'remark' => 'required',
        ], [
            'grade_id.unique' => 'This grade had already been taken.'
        ]);

        $insert_data = Classroom::create($attributes);

        if (!$insert_data) {
            return back()->with('failed', 'Something went wrong, try again.');
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You added new class.');
    }

    public function edit(Classroom $classroom)
    {
        $teachers = Teacher::with('classrooms')->get();
        $branches = Branch::with('classrooms')->get();
        $grades = Grade::with('classrooms')->get();

        return view('admin.classrooms.edit', compact(['classroom', 'branches', 'grades', 'teachers']));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $attributes = $request->validate([
            'branch_id' => 'required|numeric',
            'year' => 'required',
            'grade_id' => 'required|numeric',
//            'teacher_id' => 'required|numeric',
            'status' => 'required',
            'remark' => 'required'
        ], [
            'branch_id.required' => 'Branch is required'
        ]);

        $update_classroom = $classroom->update($attributes);

        if (!$update_classroom) {
            return back()->with('failed', 'Something went wrong, try again');
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You updated classroom credentials');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return back()->with('delete', 'Classroom deleted');
    }
}
