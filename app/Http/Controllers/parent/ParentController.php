<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\StudentParent;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index(StudentParent $parent)
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

    public function show(StudentParent $parent)
    {
        return view('admin.parents.show', compact('parent'));
    }

    public function edit(StudentParent $parent)
    {
        return view('admin.parents.show', compact('parent'));
    }

    public function update(Request $request, StudentParent $parent)
    {
        //
    }

    public function destroy(StudentParent $parent)
    {
        //
    }
}
