<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $branches = Branch::all();

        return view('admin.subjects.index', ['subjects' => $subjects, 'branches' => $branches]);
    }

    public function create(Branch $branch)
    {
        $branches = $branch->all();

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
        //
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
