<?php

namespace App\Http\Controllers;

use App\Models\Student;

class SoftDeleteController extends Controller
{
    public function trashed()
    {
        $students = Student::onlyTrashed()->get();

        return view('admin.students.trashed', compact('students'));
    }

    public function restore_student($id)
    {
        Student::withTrashed()->find($id)->restore();

        return to_route('admin.students.index')->with('success', 'Student account restored.');
    }

    public function force_delete($id)
    {
        Student::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Record deleted permanently!');
    }
}
