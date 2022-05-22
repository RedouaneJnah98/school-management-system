<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Grade $grade)
    {
        $grades = $grade->paginate(15);

        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.grades.create');
    }

    public function store(Request $request, Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        //
    }

    public function update(Request $request, Grade $grade)
    {
        //
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
