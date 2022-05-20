<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;

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
        //
    }

    public function destroy(Parents $parent)
    {
        //
    }
}
