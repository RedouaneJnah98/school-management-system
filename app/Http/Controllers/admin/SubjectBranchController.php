<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectBranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();

        return view('admin.subjects.branch', compact('branches'));
    }

    public function store(Request $request)
    {
//        $branches = Branch::findMany($request->input('branch_id'));
        $attributes = $request->input('branch_id');
        $subject = new Subject();
        $subject->name = $request->input('subject_name');

        foreach ($attributes as $item) {
            $branch = Branch::find($item);
            $branch->subjects()->save($subject);
        }
        return to_route('admin.subjects.index')->with('success', 'Success!!');
    }
}
