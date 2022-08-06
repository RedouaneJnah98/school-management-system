<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:branches,name',
            'description' => 'required'
        ]);

        $insert_data = Branch::create($attributes);

        if (!$insert_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }

        return redirect()->route('admin.branches.index')->with('success', 'Success! You added a new branch.');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $attributes = $request->validate([
            'name' => ['required', Rule::unique('branches', 'name')->ignore($branch->id)],
            'description' => 'required',
        ]);

        $update_branch = $branch->update($attributes);

        if (!$update_branch) {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }

        return redirect()->route('admin.branches.index')->with('success', 'Success! Branch updated.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->back()->with('delete', 'Branch deleted.');
    }
}
