<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
}
