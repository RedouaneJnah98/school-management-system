<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParentController extends Controller
{
    public function index(Parents $parent)
    {
        $parents = $parent->paginate(15);

        return view('admin.parents.index', compact('parents'));
    }

    public function create()
    {
        return view('admin.parents.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Parents $parent)
    {
        return view('admin.parents.show', compact('parent'));
    }

    public function edit(Parents $parent)
    {
        return view('admin.parents.edit', compact('parent'));
    }

    public function update(Request $request, Parents $parent)
    {
        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('parents', 'email')->ignore($parent->id)],
            'phone_number' => 'required|numeric',
            'gender' => 'required'
        ]);

        // update information
        $update_info = $parent->update($attributes);

        if ($update_info) {
            return redirect()->route('admin.parents.index')->with('success', 'Parent updated successfully');
        }

        return redirect()->back()->with('failed', 'Something went wrong, try again.');
    }

    public function destroy(Parents $parent)
    {
        $parent->delete();

        return redirect()->back()->with('delete', 'Parent and their student accounts deleted.');
    }
}
