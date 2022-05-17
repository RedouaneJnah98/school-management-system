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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
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
