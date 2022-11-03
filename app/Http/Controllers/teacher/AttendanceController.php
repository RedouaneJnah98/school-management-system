<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('teacher.sidebar.attendances.index');
    }

    public function create()
    {
        $teacher_id = auth('teacher')->user()->id;
        $teacher_class = Teacher::find($teacher_id);
        $class_count = auth('teacher')->user()->loadCount('classrooms');

//        dump($related_classes->classrooms);
        return view('teacher.sidebar.attendances.create', compact('teacher_class', 'class_count'));
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
