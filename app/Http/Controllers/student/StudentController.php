<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Student $student)
    {
        $students = $student->paginate(20);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|confirmed|min:6|max:30',
            'password_confirmation' => 'required|min:6|max:30',
            'dob' => 'required|date',
            'date_of_join' => 'required|date',
            'profile_image' => 'required|image',
            'gender' => 'required'
        ]);
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
