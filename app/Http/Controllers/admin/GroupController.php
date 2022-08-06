<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Grade;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('classrooms')->get();

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        $branches = Branch::all();

        return view('admin.groups.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:groups',
            'branch_id' => 'required'
        ]);

        // insert Data
        $insert_data = Group::create($attributes);

        if (!$insert_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }

        return redirect()->route('admin.groups.index')->with('success', 'Success! New group added.');
    }

    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $attributes = $request->validate([
            'name' => ['required', Rule::unique('groups', 'name')->ignore($group->id)],
            'description' => 'required'
        ]);
        // update data
        $update_data = $group->update($attributes);

        if (!$update_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again');
        }

        return redirect()->route('admin.groups.index')->with('success', 'Success! Group updated.');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->back()->with('delete', 'Group record deleted.');
    }
}
