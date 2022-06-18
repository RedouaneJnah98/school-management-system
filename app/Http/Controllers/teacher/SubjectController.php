<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('branch')->get();
        $branches = Branch::with('classrooms')->get();

        return view('admin.subjects.index', ['subjects' => $subjects, 'branches' => $branches]);
    }

    public function create()
    {
        $branches = Branch::with('classrooms')->get();

        return view('admin.subjects.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'branch_id' => 'required|numeric',
            'name' => 'required',
        ]);

        $insert_data = Subject::create($attributes);

        if (!$insert_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again');
        }

        return redirect()->route('admin.subjects.index')->with('success', 'Success! You added a new Subject.');
    }

    public function edit(Subject $subject)
    {
        $branches = Branch::with('classrooms')->get();

        return view('admin.subjects.edit', ['subject' => $subject, 'branches' => $branches]);
    }

    public function update(Request $request, Subject $subject)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'branch_id' => 'required|numeric',
        ]);

        $update_subject = $subject->update($attributes);

        if (!$update_subject) {
            return redirect()->back()->with('failed', 'Something went wrong, try again');
        }

        return redirect()->route('admin.subjects.index')->with('success', 'Success! Subject updated.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->back()->with('delete', 'Subject deleted.');
    }
}
