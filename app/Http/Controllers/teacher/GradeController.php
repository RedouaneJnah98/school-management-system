<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
    public function index(Grade $grade)
    {
        $grades = $grade->all();

        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.grades.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:grades,name',
            'description' => 'required'
        ]);

        // insert Data
        $insert_data = Grade::create($attributes);

        if (!$insert_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }

        return redirect()->route('admin.grades.index')->with('success', 'Success! New grade added.');
    }

    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $attributes = $request->validate([
            'name' => ['required', Rule::unique('grades', 'name')->ignore($grade->id)],
            'description' => 'required'
        ]);
        // update data
        $update_data = $grade->update($attributes);

        if (!$update_data) {
            return redirect()->back()->with('failed', 'Something went wrong, try again');
        }

        return redirect()->route('admin.grades.index')->with('success', 'Success! Grade updated.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->back()->with('delete', 'Grade record deleted.');
    }
}
