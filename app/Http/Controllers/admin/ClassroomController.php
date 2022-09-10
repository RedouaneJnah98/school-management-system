<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Classroom;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::withCount(['students', 'teachers'])->get();

        return view('admin.classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        $groups = Group::with('classrooms')->get();

        return view('admin.classrooms.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:classrooms',
            'group_id' => 'required|numeric',
            'year' => 'required',
            'status' => 'required',
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
//        $branches = Branch::with('classrooms')->get();
        $groups = Group::with('classrooms')->get();

        return view('admin.classrooms.edit', compact(['classroom', 'groups', 'teachers']));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $attributes = $request->validate([
            'name' => ['required', Rule::unique('classrooms')->ignore($classroom->id)],
            'year' => 'required',
            'group_id' => 'required|numeric',
            'status' => 'required',
        ], [
            'group_id.required' => 'Group is required'
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
