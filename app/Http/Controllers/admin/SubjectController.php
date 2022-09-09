<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::withCount(['branches', 'teachers'])->get();

        return view('admin.subjects.index', compact(['subjects']));
    }

    public function create()
    {
        $branches = Branch::all();
        $teachers = Teacher::all();

        return view('admin.subjects.create', compact(['branches', 'teachers']));
    }

    public function edit(Subject $subject)
    {
        $branches = Branch::all();

        return view('admin.subjects.edit', ['subject' => $subject, 'branches' => $branches]);
    }

    public function update(Request $request, Subject $subject)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        $update_subject = $subject->update($attributes);

        if (!$update_subject) {
            return redirect()->back()->with('failed', 'Something went wrong, try again');
        }

        return redirect()->route('admin.subjects.index')->with('success', 'Success! Subject name updated.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->back()->with('delete', 'Subject deleted.');
    }
}
